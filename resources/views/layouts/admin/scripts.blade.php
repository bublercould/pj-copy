

@livewireScripts
<x-livewire-alert::scripts />
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ asset('template/admin-template/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('template/admin-template/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('template/admin-template/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('template/admin-template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('template/admin-template/assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- LightBox 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>

<!-- Vendors JS -->
<script src="{{ asset('template/admin-template/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('template/admin-template/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('template/admin-template/assets/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="{{ asset('template/admin-template/assets/js/button.js') }}"></script>

<script>
    window.addEventListener('closeModal', event => {
        const ModalId = document.getElementById(event.detail.id);
        const modal = bootstrap.Modal.getInstance(ModalId);
        modal.hide();
    });
</script>
