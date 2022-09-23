<!-- Modal -->
<div class="modal fade" id="tambahProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <p>Pastikan mengupload gambar produk dengan baik, karena  hanya sekali inputan</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('produk.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Kategori Produk</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="kategoriproduk" required>
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($kategoriproduk as $kp)
                                <option value="{{ $kp->namakategori }}">{{ $kp->namakategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input class="form-control" name="namaproduk" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Harga Produk</label>
                        <input class="form-control" name="hargaproduk" id="rupiah" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Stok Produk</label>
                        <input class="form-control" name="stokproduk" type="number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Deskripsi</label>
                        <input class="form-control" maxlength="100" id="defaultconfig-3" name="deskripsiproduk" type="text" placeholder="Type Something.." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Gambar Produk 1</label>
                        <input class="form-control" type="file" name="gambarproduk1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Gambar Produk 2</label>
                        <input class="form-control" type="file" name="gambarproduk2" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Gambar Produk 3</label>
                        <input class="form-control" type="file" name="gambarproduk3" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Gambar Produk 4</label>
                        <input class="form-control" type="file" name="gambarproduk4" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
</script>
