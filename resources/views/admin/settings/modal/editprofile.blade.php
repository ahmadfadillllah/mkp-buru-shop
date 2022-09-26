<!-- Modal -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <form action="{{ route('settings.changeprofile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input class="form-control" value="{{ Auth::user()->email }}" type="text" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" name="name" value="{{ Auth::user()->name }}" type="text" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">No. Handphone</label>
                        <input class="form-control" name="nohp" value="{{ Auth::user()->nohp }}" type="number" required>
                    </div>
                    <div class="mb-3">
                        @php
                            $provinces = new \App\Http\Controllers\DependantDropdownController;
                            $provinces= $provinces->provinces();
                        @endphp
                        <label for="name" class="form-label">Provinsi</label>
                        <select class="form-select" name="provinsi_id" id="provinsi" required>
                            <option>==Pilih Salah Satu==</option>
                            @foreach ($provinces as $item)
                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Kota / Kabupaten </label>
                        <select class="form-select" name="kota_id" id="kota" required>
                            <option>==Pilih Salah Satu==</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Kecamatan</label>
                        <select class="form-select" name="kecamatan_id" id="kecamatan" required>
                            <option>==Pilih Salah Satu==</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Kelurahan</label>
                        <select class="form-select" name="kelurahan_id" id="desa" required>
                            <option>==Pilih Salah Satu==</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Zip Code</label>
                        <input class="form-control" name="zipcode" value="{{ Auth::user()->zipcode }}" type="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Alamat</label>
                        <input class="form-control" name="alamat" value="{{ Auth::user()->alamat }}" type="text" required>
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
