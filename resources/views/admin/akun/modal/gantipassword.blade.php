<!-- Modal -->
<div class="modal fade" id="gantiPassword{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelola Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('akun.changepassword', $a->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input class="form-control" value="{{ $a->email }}" type="text" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Password Baru</label>
                        <input class="form-control" name="passwordbaru" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
