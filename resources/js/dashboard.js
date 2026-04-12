/**
 * Dashboard : Sidebar mobile + color picker sync + image preview
 */
document.addEventListener('DOMContentLoaded', () => {

    // ─── Sidebar toggle (mobile) ──────────────────────────────────────────────
    const dashBurger  = document.getElementById('dashBurger');
    const dashSidebar = document.getElementById('dashSidebar');

    if (dashBurger && dashSidebar) {
        // Créer overlay
        const overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        document.body.appendChild(overlay);

        const openSidebar = () => {
            dashSidebar.classList.add('is-open');
            overlay.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        };
        const closeSidebar = () => {
            dashSidebar.classList.remove('is-open');
            overlay.classList.remove('is-open');
            document.body.style.overflow = '';
        };

        dashBurger.addEventListener('click', () => {
            dashSidebar.classList.contains('is-open') ? closeSidebar() : openSidebar();
        });
        overlay.addEventListener('click', closeSidebar);
    }

    // ─── Sync color picker ↔ hex input ───────────────────────────────────────
    document.querySelectorAll('.color-field').forEach(field => {
        const picker = field.querySelector('input[type="color"]');
        const hex    = field.querySelector('.color-hex');

        if (picker && hex) {
            picker.addEventListener('input', () => { hex.value = picker.value; });
            hex.addEventListener('input', () => {
                if (/^#[0-9a-fA-F]{6}$/.test(hex.value)) {
                    picker.value = hex.value;
                }
            });
        }
    });

    // ─── Aperçu image avant upload ───────────────────────────────────────────
    document.querySelectorAll('input[type="file"][data-preview]').forEach(input => {
        const previewId = input.getAttribute('data-preview');
        const preview   = document.getElementById(previewId);

        if (preview) {
            input.addEventListener('change', () => {
                const file = input.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        if (preview.tagName === 'IMG') {
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });

    // ─── Confirmation de suppression ─────────────────────────────────────────
    document.querySelectorAll('[data-confirm]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const msg = btn.getAttribute('data-confirm') || 'Êtes-vous sûr de vouloir supprimer ?';
            if (!confirm(msg)) {
                e.preventDefault();
            }
        });
    });

    // ─── Dismiss alertes ─────────────────────────────────────────────────────
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.4s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 400);
        }, 4000);
    });
});
