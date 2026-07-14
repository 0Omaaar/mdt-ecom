{{-- ============================================================
     Shared JS helpers for Produits admin pages
     Include ONCE per page (index / create / edit / show)
     ============================================================ --}}
<div id="toast-container"></div>

<script>
    /* ---------- CSRF helper ---------- */
    window.CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    /* ---------- Toast notifications ---------- */
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;
        const icon = type === 'success' ? 'la-check-circle' : (type === 'error' ? 'la-times-circle' : 'la-info-circle');
        const toast = document.createElement('div');
        toast.className = `p-toast ${type}`;
        toast.innerHTML = `<i class="la ${icon} font-medium-2"></i><span>${message}</span>`;
        container.appendChild(toast);
        setTimeout(() => {
            toast.style.transition = 'opacity .3s ease, transform .3s ease';
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(20px)';
            setTimeout(() => toast.remove(), 300);
        }, 3200);
    }

    /* ---------- Execute <script> tags injected via innerHTML ----------
       Browsers do not execute <script> tags inserted through
       element.innerHTML = "...". This helper clones & re-inserts them
       so code coming from an AJAX-loaded partial (e.g. the Edit modal
       content) actually runs (CKEditor init, FilePond init, etc.)      */
    function runInjectedScripts(container) {
        const scripts = container.querySelectorAll('script');
        scripts.forEach(oldScript => {
            const newScript = document.createElement('script');
            if (oldScript.src) {
                newScript.src = oldScript.src;
            } else {
                newScript.textContent = oldScript.textContent;
            }
            Array.from(oldScript.attributes).forEach(attr => newScript.setAttribute(attr.name, attr.value));
            oldScript.parentNode.replaceChild(newScript, oldScript);
        });
    }

    /* ---------- Generic fetch wrapper ---------- */
    async function apiRequest(url, options = {}) {
        const headers = Object.assign({
            'X-CSRF-TOKEN': window.CSRF_TOKEN,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }, options.headers || {});

        const res = await fetch(url, Object.assign({}, options, { headers }));
        let data = null;
        try { data = await res.json(); } catch (e) { /* not json */ }

        if (!res.ok) {
            const err = new Error((data && data.message) || 'Une erreur est survenue.');
            err.status = res.status;
            err.data = data;
            throw err;
        }
        return data;
    }
</script>
