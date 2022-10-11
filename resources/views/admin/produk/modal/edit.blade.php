<!-- Modal -->
<div class="modal fade" id="editProduk{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input class="form-control" value="{{ $p->namaproduk }}" type="text" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Harga Produk</label>
                        <input class="form-control" id="rupiah" name="hargaproduk" value="@currency($p->hargaproduk)"  type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Stok Produk</label>
                        <input class="form-control" name="stokproduk" value="{{ $p->stokproduk }}" type="number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Deskripsi</label>
                        <input class="form-control" maxlength="100" value="{{ $p->deskripsiproduk }}" id="defaultconfig-3" name="deskripsiproduk" type="text" placeholder="Type Something.." required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
