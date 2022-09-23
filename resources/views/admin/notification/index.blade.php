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
        'Upps!',
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
@error('passwordsekarang')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('passwordbaru')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('kategoriproduk')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('namaproduk')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('hargaproduk')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('stokproduk')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('deskripsiproduk')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('gambarproduk1')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('gambarproduk2')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('gambarproduk3')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror
@error('gambarproduk4')
    <div class="alert alert-warning" role="alert">
        {{ $message }}
    </div>
@enderror

