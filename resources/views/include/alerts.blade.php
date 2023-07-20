@if (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: "{{ session('warning') }}",
        })
    </script>
@endif



@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
        })
    </script>
@endif



@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success...',
            text: "{{ session('success') }}",
        })
    </script>
@endif
