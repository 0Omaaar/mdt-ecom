<style>
    /* ============================================================
       Produits Admin — Shared Modern UI Styles
       Used by: index / create / edit / show
       ============================================================ */

    :root{
        --p-primary:#4b6cf5;
        --p-primary-dark:#3955c9;
        --p-success:#17c666;
        --p-danger:#ea5455;
        --p-warning:#ff9f43;
        --p-muted:#8592a3;
        --p-border:#eef1f6;
        --p-bg-soft:#f7f9fc;
        --p-radius:14px;
    }

    .app-content .card{
        border: none;
        border-radius: var(--p-radius);
        box-shadow: 0 4px 24px rgba(30, 41, 59, 0.06);
        transition: box-shadow .25s ease;
    }
    .app-content .card-header{
        background-color: transparent;
        border-bottom: 1px solid var(--p-border);
        padding: 1.25rem 1.5rem;
        display:flex;
        align-items:center;
        justify-content:space-between;
        flex-wrap:wrap;
        gap:.75rem;
    }
    .app-content .card-header .card-title{
        font-weight:700;
        margin-bottom:0;
        display:flex;
        align-items:center;
        gap:.55rem;
    }
    .app-content .card-header .card-title i{ color: var(--p-primary); }
    .app-content .card-body{ padding: 1.5rem; }

    /* Page heading */
    .page-heading{
        display:flex;
        align-items:center;
        gap:.6rem;
        font-weight:700;
    }
    .page-heading .icon-wrap{
        width:38px;height:38px;border-radius:10px;
        display:flex;align-items:center;justify-content:center;
        background: linear-gradient(135deg, var(--p-primary), #7a95ff);
        color:#fff;font-size:1rem;
        box-shadow:0 6px 16px rgba(75,108,245,.35);
    }

    /* Buttons */
    .btn{ border-radius: 9px; font-weight:600; letter-spacing:.2px; }
    .btn-primary{ background: linear-gradient(135deg, var(--p-primary), var(--p-primary-dark)); border:none; box-shadow: 0 6px 16px rgba(75,108,245,.28); }
    .btn-primary:hover{ filter:brightness(1.05); }
    .btn-danger{ background: linear-gradient(135deg,#ff6b6b,var(--p-danger)); border:none; }
    .btn-warning{ background:#fff; color:#6c757d; border:1px solid var(--p-border); box-shadow:none; }
    .btn-warning:hover{ background:var(--p-bg-soft); color:#495057; }
    .btn-outline-light-danger{ background:#fff5f5; color:var(--p-danger); border:1px solid #ffe0e0; }
    .btn-outline-light-danger:hover{ background:var(--p-danger); color:#fff; }

    /* Table */
    .table-responsive{ border-radius: 10px; }
    .table thead th{
        border-top:none;
        border-bottom: 2px solid var(--p-border) !important;
        color: var(--p-muted);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.74rem;
        letter-spacing: 0.6px;
        white-space: nowrap;
        background:var(--p-bg-soft);
    }
    .table thead th:first-child{ border-top-left-radius:10px; }
    .table thead th:last-child{ border-top-right-radius:10px; }
    .table-bordered, .table-bordered th, .table-bordered td{ border: none; }
    .table td{
        vertical-align: middle;
        padding: .85rem .75rem;
        border-bottom: 1px solid var(--p-border);
    }
    .table tbody tr{ transition: background-color .15s ease; }
    .table tbody tr:hover{ background-color: var(--p-bg-soft) !important; }
    .table tbody tr.row-removing{ opacity:0; transform: translateX(12px); transition: all .25s ease; }

    .product-thumb{
        width: 52px; height: 52px; border-radius: 10px; object-fit: cover;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border: 1px solid var(--p-border);
    }
    .product-thumb-empty{
        width:52px;height:52px;border-radius:10px;
        display:flex;align-items:center;justify-content:center;
        background: var(--p-bg-soft); color:#c7cedb; font-size:1.2rem;
        border: 1px dashed #dde3ee;
    }
    .product-name-cell{ display:flex; flex-direction:column; }
    .product-name-cell .p-name{ font-weight:600; color:#2b2f38; }
    .product-name-cell .p-id{ font-size:.72rem; color:var(--p-muted); }

    /* Soft Badges */
    .badge-soft-success{ background-color:#e6f8ee; color:#0f9d58; border-radius:20px; padding:.45em .85em; font-weight:600; }
    .badge-soft-warning{ background-color:#fff4e5; color:#b06d00; border-radius:20px; padding:.45em .85em; font-weight:600; }
    .badge-soft-danger{ background-color:#fdeaea; color:#c92a2a; border-radius:20px; padding:.45em .85em; font-weight:600; }
    .badge-soft-dark{ background-color:#eef1f6; color:#4a5568; border-radius:20px; padding:.45em .85em; font-weight:600; }
    .badge-soft-primary{ background-color:#eaefff; color:var(--p-primary-dark); border-radius:20px; padding:.45em .85em; font-weight:600; }

    /* Action dropdown */
    .btn-action-ghost{
        background: transparent; color: var(--p-muted); border: 1px solid transparent;
        box-shadow: none; padding: .45rem .65rem; border-radius: 8px;
        transition: all 0.2s; cursor: pointer;
    }
    .btn-action-ghost:hover{ background: var(--p-bg-soft); color: #495057; border-color: var(--p-border); }
    .dropdown-menu{ border:none; border-radius:12px; box-shadow: 0 10px 30px rgba(30,41,59,.12); padding:.4rem; }
    .dropdown-menu .dropdown-item{ border-radius:8px; padding:.55rem .8rem; font-size:.9rem; display:flex; align-items:center; gap:.55rem; }
    .dropdown-menu .dropdown-item i{ width:16px; text-align:center; }
    .dropdown-menu .dropdown-item:hover{ background:var(--p-bg-soft); }
    .dropdown-menu .dropdown-item.text-danger:hover{ background:#fdeaea; color:#c92a2a !important; }

    /* Bulk actions bar */
    .bulk-actions-bar{
        display:none;
        align-items:center;
        gap:.75rem;
        background: #eef2ff;
        border: 1px solid #dbe4ff;
        color: var(--p-primary-dark);
        padding:.55rem .9rem;
        border-radius: 10px;
        font-weight:600;
        font-size:.9rem;
        animation: fadeSlideIn .2s ease;
    }
    @keyframes fadeSlideIn{ from{opacity:0; transform:translateY(-4px);} to{opacity:1; transform:translateY(0);} }

    /* Checkboxes */
    .select-checkbox{ width:18px; height:18px; cursor:pointer; accent-color: var(--p-primary); }

    /* Modal modernization */
    .modal-content{ border:none; border-radius: 16px; overflow:hidden; box-shadow: 0 20px 60px rgba(15,23,42,.25); }
    .modal-header{ border-bottom: 1px solid var(--p-border); padding: 1.1rem 1.4rem; }
    .modal-header .modal-title{ font-weight:700; display:flex; align-items:center; gap:.5rem; }
    .modal-footer{ border-top: 1px solid var(--p-border); padding: 1rem 1.4rem; }
    .modal-body{ padding: 1.4rem; }
    .modal-loading{
        display:flex; flex-direction:column; align-items:center; justify-content:center;
        gap:.9rem; padding: 3.5rem 1rem; color: var(--p-muted);
    }
    .modal-loading .spinner{
        width:38px;height:38px;border-radius:50%;
        border:3px solid #e3e8f5; border-top-color: var(--p-primary);
        animation: spin .7s linear infinite;
    }
    @keyframes spin{ to{ transform: rotate(360deg);} }

    /* Form styling */
    .form-section{ font-weight:700; color:#2b2f38; margin: 1.4rem 0 1rem; display:flex; align-items:center; gap:.5rem; }
    .form-section i{ color: var(--p-primary); }
    .form-control, .custom-select, select.form-control{
        border-radius:9px; border:1px solid #e3e8f0; padding: .55rem .8rem;
        font-size:.92rem; box-shadow:none !important;
    }
    .form-control:focus, select.form-control:focus{
        border-color: var(--p-primary); box-shadow: 0 0 0 3px rgba(75,108,245,.12) !important;
    }
    .label-control{ font-weight:600; color:#4a5568; font-size:.88rem; }
    .form-check-modern{
        display:flex; align-items:center; gap:.55rem; background:var(--p-bg-soft);
        border:1px solid var(--p-border); border-radius:10px; padding:.6rem .8rem;
        font-size:.87rem; font-weight:600; color:#4a5568; cursor:pointer;
    }
    .form-check-modern input{ width:16px;height:16px; accent-color:var(--p-primary); cursor:pointer; }
    .invalid-feedback{ display:block; font-size:.78rem; }
    .is-invalid{ border-color: var(--p-danger) !important; }

    /* Image upload / preview */
    .image-drop{
        border: 1.5px dashed #d7deec; border-radius: 12px; background: var(--p-bg-soft);
        padding: 1rem; text-align:center; position:relative;
    }
    .image-drop input[type=file]{ position:relative; z-index:2; }
    .thumb-wrapper{ position:relative; display:inline-block; }
    .thumb-wrapper img{ width:92px; height:92px; object-fit:cover; border-radius:10px; border:1px solid var(--p-border); }
    .thumb-remove-btn{
        position:absolute; top:-8px; right:-8px; background:var(--p-danger); color:#fff; border:none;
        border-radius:50%; width:22px; height:22px; cursor:pointer; font-size:13px; line-height:1;
        display:flex; align-items:center; justify-content:center; box-shadow:0 3px 8px rgba(0,0,0,.2);
    }

    /* Toasts */
    #toast-container{
        position: fixed; top: 20px; right: 20px; z-index: 20000;
        display:flex; flex-direction:column; gap:.6rem;
    }
    .p-toast{
        min-width: 280px; max-width: 360px; background:#fff; border-radius: 10px;
        box-shadow: 0 12px 30px rgba(15,23,42,.18); padding: .85rem 1rem;
        display:flex; align-items:flex-start; gap:.6rem; font-size:.88rem; font-weight:600;
        border-left: 4px solid var(--p-primary); animation: toastIn .25s ease;
    }
    .p-toast.success{ border-left-color: var(--p-success); }
    .p-toast.error{ border-left-color: var(--p-danger); }
    .p-toast i{ margin-top:2px; }
    .p-toast.success i{ color: var(--p-success); }
    .p-toast.error i{ color: var(--p-danger); }
    @keyframes toastIn{ from{ opacity:0; transform: translateX(20px);} to{ opacity:1; transform:translateX(0);} }

    /* Empty state */
    .empty-state{ text-align:center; padding: 3rem 1rem; color: var(--p-muted); }
    .empty-state i{ font-size: 2.4rem; margin-bottom: .75rem; opacity:.55; }
</style>
