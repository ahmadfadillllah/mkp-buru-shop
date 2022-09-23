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
@error('name')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('email')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('nohp')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('alamat')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('password')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('password_confirmation')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
