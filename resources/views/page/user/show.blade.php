@php
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\URL;

@endphp

<x-m-layout-v2>
    <div style="margin-top: 90px">
        <div class="container shadow">
            <div class="row py-4 px-5" style="background-color: #f6fcfd">

                <div class="col-lg-4">
                    <img style="max-height: 200px;object-fit: contain" class="w-100"
                        src="{{ asset("storage/$profile->foto_profile") }}" alt="">
                </div>
                <div class="py-4 col-lg-8" style="padding: 0 20px">
                    <div class="h3">{!! $profile->nama !!}</div>
                    <div>{!! $profile->user->email !!}</div>
                    <div class="mt-2 px-3 py-3 h5 border">"{!! $profile->headline ?? 'Belum menuliskan apapun (Silahkan update dihalaman dashboard - profile)' !!}"</div>

                </div>
            </div>
            <div class="container py-4 text-white" style="border: 2px dashed white;background-color: black">
                <div class="row align-items-center">
                    <div class="col-4">
                        <img style="max-height: 150px;object-fit: contain" class="w-100"
                            src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->backgroundColor(0, 0, 0)->color(255, 255, 255, 100)->size(1000)->generate(route('users-search', $profile->nama)),
) !!}">
                    </div>
                    <div class=" py-2 col-8 ">
                        <div class="h4">Silahkan scan menggunakan aplikasi Qr code</div>
                        <div class="btn-group gap-1" role="group" aria-label="Basic example">
                            <a href="" target="__blank" class="btn btn-primary"><i class="fas fa-qrcode"></i> Show</a>
                            <button type="button" class="btn btn-primary"> <i class="fas fa-share"></i> Share</button>

                        </div>

                    </div>
                </div>
            </div>
            <div class=" container py-4" style="border-bottom: 2px dashed lightskyblue">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        {!! $profile->biodata !!}
                    </div>

                </div>
            </div>
            {{-- <div class="row mt-2">
                <div class="col-12">
                    <div style="border-left: 4px solid rgb(36, 107, 151)" class="h5 p-3">My brain post
                        ({{ $profile->nama }})</div>

                </div>
                @forelse ($profile->user->brainPosts as $bPost )

                    <div class="col-4">
                        <div class="card">
                            <img class="w-100" style="max-height: 140px;object-fit: contain"
                                src="{{ asset("storage/$bPost->thumbnail") }}" class="card-img-top" alt="...">
                            <div class="card-header p-2">
                                {{ $bPost->title }}
                            </div>
                            <div class="card-body text-center">
                                <a href="" class="btn btn-primary">Readmore</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center" role="alert">
                        No posts
                    </div>

                @endforelse



            </div> --}}

            <div class="row mt-4">
                <div class="col-12">
                    <div style="border-left: 4px solid rgb(36, 107, 151)" class="h5 p-3 mt-2">User post
                        ({{ $profile->nama }})</div>

                </div>

                @forelse ($profile->user->posts as $posts )

                    <div class="col-4">

                        <div class="card">
                            <img class="w-100" style="max-height: 140px;object-fit: contain"
                                src="{{ asset("storage/$posts->thumbnail") }}" class="card-img-top"
                                alt="{{ $posts->title }}">
                            <div class="card-header">
                                {{ $posts->title }}
                            </div>
                            <div class="card-body text-center">
                                <a href="{{ route('detail-posts', $posts->slug) }}"
                                    class="btn btn-dark">Readmore</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center" role="alert">
                        No posts
                    </div>

                @endforelse


            </div>

        </div>
    </div>

</x-m-layout-v2>
