<div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Konfirmasi Hapus
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                Apakah kamu yakin ingin menghapus kategori
                <strong>{{ $category->nama_kategori }}</strong>?

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>

                <form action="{{ route('admin.categories.destroy', $category) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger">
                        Ya, Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>