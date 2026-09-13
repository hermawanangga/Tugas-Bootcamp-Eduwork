<div>
    <h4 class="fw-semibold mb-1 text-danger">Hapus Akun</h4>
    <p class="text-muted small mb-4">
        Setelah akun dihapus, seluruh data terkait akan dihapus secara permanen.
        Pastikan kamu sudah menyimpan data yang diperlukan sebelum melanjutkan.
    </p>
</div>

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
    Hapus Akun
</button>

<div class="modal fade" id="confirmUserDeletion" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title">Yakin mau hapus akun?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p class="text-muted small mb-3">
                        Setelah dihapus, seluruh data akun ini akan hilang permanen.
                        Masukkan password kamu untuk konfirmasi.
                    </p>

                    <label for="delete_password" class="form-label visually-hidden">Password</label>
                    <input id="delete_password" name="password" type="password"
                           class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                           placeholder="Password">
                    @error('password', 'userDeletion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Akun</button>
                </div>

            </form>

        </div>
    </div>
</div>

@if ($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('confirmUserDeletion'));
            modal.show();
        });
    </script>
@endif