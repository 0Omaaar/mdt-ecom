{{--
    ============================================================================
    Behaviour script for _product_form.blade.php.

    This script is designed to be SAFE TO RUN MULTIPLE TIMES — every time the
    Edit modal is opened via AJAX, this partial is re-injected and re-executed
    (see runInjectedScripts() in _scripts_common.blade.php). All bindings are
    scoped to the specific <form> that was just inserted (identified by
    formSelector), and any previous CKEditor instance for the same textarea id
    is destroyed first to avoid "already has an instance" errors.

    Requires (must be loaded on the page BEFORE this script runs):
      - jQuery
      - CKEditor 5 classic build   (cdn.ckeditor.com/ckeditor5/...)
      - showToast() / apiRequest() from _scripts_common.blade.php

    Usage: include right after @include('admin.products._product_form', [...])
           optionally pass $onSuccessRedirect = route(...) for full-page forms,
           leave null when used inside the AJAX modal (index page handles it).
    ============================================================================
--}}
<script>
    (function () {
        window.__ckEditors = window.__ckEditors || {};

        function initProductForm(formEl) {
            if (!formEl) return;

            /* ---------------- CKEditor ---------------- */
            formEl.querySelectorAll('.js-editor-full, .js-editor-brief').forEach(function (textarea) {
                var id = textarea.id;
                if (window.__ckEditors[id]) {
                    try { window.__ckEditors[id].destroy(); } catch (e) {}
                    delete window.__ckEditors[id];
                }
                if (typeof ClassicEditor !== 'undefined') {
                    ClassicEditor.create(textarea).then(function (editor) {
                        window.__ckEditors[id] = editor;
                    }).catch(function (error) {
                        console.error('CKEditor init failed:', error);
                    });
                }
            });

            /* ---------------- Category -> Subcategory filter ---------------- */
            var categorySelect = formEl.querySelector('.js-category-select');
            var subcategorySelect = formEl.querySelector('.js-subcategory-select');

            function filterSubcategories(resetSelection) {
                if (!categorySelect || !subcategorySelect) return;
                var categoryId = categorySelect.value;
                var options = subcategorySelect.querySelectorAll('option');
                var currentValid = false;

                options.forEach(function (option) {
                    if (option.value === '') { option.style.display = ''; return; }
                    var optCat = option.getAttribute('data-category');
                    var visible = (optCat == categoryId);
                    option.style.display = visible ? '' : 'none';
                    if (visible && option.value === subcategorySelect.value) currentValid = true;
                });

                if (resetSelection || !currentValid) {
                    subcategorySelect.value = '';
                }
            }

            if (categorySelect) {
                categorySelect.addEventListener('change', function () { filterSubcategories(true); });
                filterSubcategories(false);
            }

            /* ---------------- Image preview: single miniature ---------------- */
            formEl.querySelectorAll('.js-image-input').forEach(function (input) {
                input.addEventListener('change', function (event) {
                    var previewTarget = document.getElementById(input.dataset.previewTarget);
                    var oldTarget = input.dataset.oldTarget ? document.getElementById(input.dataset.oldTarget) : null;
                    if (!previewTarget) return;
                    previewTarget.innerHTML = '';
                    var file = event.target.files && event.target.files[0];
                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.maxWidth = '100px';
                            img.style.maxHeight = '100px';
                            img.style.borderRadius = '8px';
                            previewTarget.appendChild(img);
                            if (oldTarget) oldTarget.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    } else if (oldTarget) {
                        oldTarget.style.display = 'block';
                    }
                });
            });

            /* ---------------- Image preview: multiple gallery images ---------------- */
            formEl.querySelectorAll('.js-images-input').forEach(function (input) {
                input.addEventListener('change', function (event) {
                    var previewTarget = document.getElementById(input.dataset.previewTarget);
                    if (!previewTarget) return;
                    previewTarget.innerHTML = '';
                    Array.from(event.target.files || []).forEach(function (file) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var wrapper = document.createElement('div');
                            wrapper.className = 'thumb-wrapper';
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            wrapper.appendChild(img);
                            previewTarget.appendChild(wrapper);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            });

            /* ---------------- Delete existing secondary image (AJAX) ---------------- */
            formEl.querySelectorAll('.js-delete-product-image').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var productId = btn.dataset.productId;
                    var imageId = btn.dataset.imageId;
                    if (!confirm('Supprimer cette image ?')) return;

                    apiRequest(`/admin/products/${productId}/image/${imageId}`, { method: 'DELETE' })
                        .then(function () {
                            var wrapper = document.getElementById(formEl.id.replace('Form', '') + '_img-wrapper-' + imageId)
                                || document.querySelector('[id$="img-wrapper-' + imageId + '"]');
                            if (wrapper) wrapper.remove();
                            var container = btn.closest('[id$="oldImagesPreview"]');
                            if (container && container.querySelectorAll('.thumb-wrapper').length === 0) {
                                var msg = document.createElement('p');
                                msg.className = 'text-muted mt-2 mb-0';
                                msg.setAttribute('data-no-images-msg', '');
                                msg.textContent = 'Aucune image secondaire.';
                                container.parentNode.appendChild(msg);
                            }
                            showToast('Image supprimée.', 'success');
                        })
                        .catch(function (err) {
                            showToast(err.message || 'Erreur lors de la suppression.', 'error');
                        });
                });
            });

            /* ---------------- Clear previous validation errors ---------------- */
            function clearFormErrors() {
                formEl.querySelectorAll('.is-invalid').forEach(function (el) { el.classList.remove('is-invalid'); });
                formEl.querySelectorAll('[data-error-for]').forEach(function (el) { el.textContent = ''; });
            }

            function showFormErrors(errors) {
                clearFormErrors();
                Object.keys(errors || {}).forEach(function (field) {
                    var input = formEl.querySelector(`[name="${field}"]`);
                    var errEl = formEl.querySelector(`[data-error-for="${field}"]`);
                    if (input) input.classList.add('is-invalid');
                    if (errEl) errEl.textContent = Array.isArray(errors[field]) ? errors[field][0] : errors[field];
                });
                var firstInvalid = formEl.querySelector('.is-invalid');
                if (firstInvalid) firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            /* ---------------- Submit form via AJAX ---------------- */
            formEl.addEventListener('submit', function (e) {
                e.preventDefault();
                clearFormErrors();

                var submitBtn = formEl.querySelector('.js-submit-btn');
                var label = submitBtn ? submitBtn.querySelector('.js-btn-label') : null;
                var spinner = submitBtn ? submitBtn.querySelector('.js-btn-spinner') : null;

                if (submitBtn) submitBtn.disabled = true;
                if (label) label.classList.add('d-none');
                if (spinner) spinner.classList.remove('d-none');

                var formData = new FormData(formEl);

                fetch(formEl.action, {
                    method: 'POST', // Laravel reads _method for PUT spoofing
                    headers: {
                        'X-CSRF-TOKEN': window.CSRF_TOKEN,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(async function (res) {
                    var data = null;
                    try { data = await res.json(); } catch (e) {}

                    if (res.status === 422) {
                        showFormErrors((data && data.errors) || {});
                        showToast('Merci de corriger les erreurs du formulaire.', 'error');
                        return;
                    }
                    if (!res.ok) {
                        throw new Error((data && data.message) || 'Une erreur est survenue.');
                    }

                    var mode = formEl.dataset.mode;
                    showToast((data && data.message) || (mode === 'edit' ? 'Produit modifié avec succès.' : 'Produit ajouté avec succès.'), 'success');

                    // Let the page decide what happens next (close modal / refresh row / redirect)
                    document.dispatchEvent(new CustomEvent('product-form:success', {
                        detail: { mode: mode, productId: formEl.dataset.productId, data: data, form: formEl }
                    }));
                })
                .catch(function (err) {
                    showToast(err.message || 'Une erreur est survenue lors de l\'enregistrement.', 'error');
                })
                .finally(function () {
                    if (submitBtn) submitBtn.disabled = false;
                    if (label) label.classList.remove('d-none');
                    if (spinner) spinner.classList.add('d-none');
                });
            });

            /* ---------------- Cancel button inside modal ---------------- */
            formEl.querySelectorAll('[data-dismiss-target]').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.dispatchEvent(new CustomEvent('product-form:cancel', { detail: { form: formEl } }));
                });
            });
        }

        // Auto-init any product-form present right now (covers full-page create/edit)
        document.querySelectorAll('.product-form').forEach(initProductForm);

        // Expose for the modal-loader on the index page
        window.initProductForm = initProductForm;
    })();
</script>
