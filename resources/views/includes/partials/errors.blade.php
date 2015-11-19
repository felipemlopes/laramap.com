@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            $.notify({
                message: '{{ $error }}'
              },{
                type: 'danger'
            });
        </script>
    @endforeach
@endif