{{-- Error Alert --}}
@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <i class="bi bi-x-circle-fill me-2"></i>

    {{ session('error') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

{{-- Success Alert --}}
@if(session('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <i class="bi bi-check-circle-fill me-2"></i>

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successAlert = document.querySelector('.alert-success');

        if (successAlert) {
            setTimeout(function () {
                var closeButton = successAlert.querySelector('.btn-close');

                if (closeButton) {
                    closeButton.click();
                }
            }, 3000);
        }
    });
</script>

@endif



{{-- Validation Error Alert --}}
@if($errors->any())

<div class="alert alert-danger alert-dismissible fade show" role="alert">

    <strong>Terjadi kesalahan:</strong>

    <ul class="mb-0 mt-2">

        @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

        @endforeach

    </ul>


    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif