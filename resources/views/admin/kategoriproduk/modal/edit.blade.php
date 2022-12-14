<!-- Modal -->
<div class="modal fade" id="editKategori{{ $kp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kategori Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('kategoriproduk.update', $kp->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input class="form-control" name="namakategori" value="{{ $kp->namakategori }}" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Deskripsi</label>
                        <input class="form-control" maxlength="100" id="defaultconfig-3" name="deskripsikategori" type="text" value="{{ $kp->deskripsikategori }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="formFile">File upload</label>
                        <input class="form-control" type="file" name="gambarkategori" required>
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
