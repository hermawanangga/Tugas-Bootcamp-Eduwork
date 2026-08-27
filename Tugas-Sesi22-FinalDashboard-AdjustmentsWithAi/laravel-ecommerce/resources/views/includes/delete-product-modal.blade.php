@php
    $modalId = 'deleteModal' . ($modalIdSuffix ?? $product->id);
@endphp

<div class="modal fade" id="{{ $modalId }}" tabindex="-1">

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

                Apakah kamu yakin ingin menghapus
                <strong>{{ $product->nama_produk }}</strong>?

            </div>


            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Batal
                </button>


                <form action="{{ route('admin.products.destroy', $product->id) }}"
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