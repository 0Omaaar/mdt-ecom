@if(Session::has('success'))
    <script>
        swal({
            title: "Message",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
            timer: 3000
        });
    </script>
@endif
@if(Session::has('error'))
    <script>
        swal({
            title: "Message",
            text: "{{ Session::get('error') }}",
            icon: "error",
            button: "OK",
            timer: 3000,
            dangerMode: true
        });
    </script>
@endif
