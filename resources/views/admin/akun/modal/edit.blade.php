<!-- Modal -->
<div class="modal fade" id="editAkun{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelola Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('akun.update', $a->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input class="form-control" value="{{ $a->email }}" type="text" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" name="name" value="{{ $a->name }}" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">No. Handphone</label>
                        <input class="form-control" name="nohp" value="{{ $a->nohp }}" type="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Alamat</label>
                        <input class="form-control" name="alamat" value="{{ $a->alamat }}" type="text" required>
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
