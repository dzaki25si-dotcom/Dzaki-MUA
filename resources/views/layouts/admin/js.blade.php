<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('adminassets/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('adminassets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<script src="{{ asset('adminassets/js/main.js') }}"></script>

<script>
    function hideSpinner() {
        const spinner = document.getElementById('spinner');

        if (spinner) {
            spinner.classList.remove('show');
            spinner.style.display = 'none';
        }
    }

    window.addEventListener('load', hideSpinner);

    if (document.readyState === 'complete') {
        hideSpinner();
    }
</script>

@stack('scripts')
