@if (session('success'))
    @section('js')
        <script>
            $(document).ready(function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
            });
        </script>
    @endsection
@endif
