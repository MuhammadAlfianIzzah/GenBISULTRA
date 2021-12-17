<x-m-layout-v2>

    <div class="p-2 mb-2 bg-light rounded-3 mt-r shadow-sm">
        <div class="container py-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 justify-content-center d-flex flex-column align-items-center">
                    <h1 class="display-5 fw-bold"><i class="fas fa-clipboard"></i> Qrcode Generator</h1>

                    <a href="{{ route('show-qrcode') }}" class="text-small text-danger">
                        ~ Regenerate ~
                    </a>

                </div>

            </div>

        </div>
    </div>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card bg-dark text-white">
                    <img src="{!! $qrcode->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png') !!}">

                </div>
                {{-- <img class="w-100 img-thumbnail" src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->backgroundColor(0, 0, 0)->color(255, 255, 255, 100)->size(1000)->generate($qrcode),
) !!}"> --}}
            </div>
        </div>
    </div>
</x-m-layout-v2>
