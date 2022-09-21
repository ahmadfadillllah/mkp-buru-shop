@if (session('success'))
    <script>
        Swal.fire(
        'Good!',
        '{{ session('success') }}',
        'success'
        )
    </script>
@endif
@if (session('info'))
    <script>
        Swal.fire(
        'Good!',
        '{{ session('info') }}',
        'info'
        )
    </script>
@endif
@error('namakategori')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('deskripsikategori')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('gambarkategori')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
