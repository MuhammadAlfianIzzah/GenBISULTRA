<x-m-layout-v2>
    @push('style')
        <link rel="stylesheet" href="{{ asset('css/tentangkami.css') }}">
    @endpush
    <div class="bg-white py-4">
        <div style="margin-top: 70px">
            <div class="h-100 p-5 text-dark bg-light text-center rounded-3">
                <h2>Tentang Kami</h2>
                <p>~ GenBI SULAWESI TENGGARA ~</p>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="accordion mb-3 mt-2" id="accordionExample">
            <div class="accordion-item" style="border: 2px dashed salmon">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button rounded" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Sejarah Website GenBI SULTRA
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <section class="page-section" id="about">
                            <div class="container">
                                {{-- <div class="text-center">
                                    <h2 class="section-heading text-uppercase">About</h2>
                                    <h3 class="section-subheading text-muted">Tentang GenBI SULTRA</h3>
                                </div> --}}
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-image">
                                            <img style="width: 100%;height: 100%; object-fit: cover;border-radius: 50%"
                                                src="{{ asset('img/APP.png') }}" alt="app">
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4>2021</h4>
                                                <h4 class="subheading">Pembuatan Website</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p class="text-muted">Website Dibuat Oleh Anggota GenBI SULTRA

                                                </p>
                                                <a href="">See Author</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-inverted">
                                        <div class="timeline-image"><img class="rounded-circle img-fluid"
                                                src="{{ asset('img/launch.jpeg') }}" alt="launch"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4>3 Januari 2022</h4>
                                                <h4 class="subheading">Launching Website</h4>
                                            </div>
                                            <div class="timeline-body">
                                                <p class="text-muted">Peresmian Website GenBI SULTRA oleh Pembina
                                                    GenBI SULTRA</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="timeline-inverted">
                                        <div class="timeline-image">
                                            <h4>
                                                Terus dikembangkan
                                            </h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa itu GenBI
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Organisasi Generasi Baru Indonesia (GenBI) merupakan hasil dari CSR dari Bank Indonesia (BI)
                        dalam bidang pendidikan, dimana organisasi ini terbentuk sebagai wadah bagi penerima
                        beasiswa yang berikan kepada universitas tertentu di Indonesia dalam pengembangan potensi
                        diri.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apa tugas GenBI?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Sebagai penerima beasiswa, GenBI memegang tiga peran dan tanggung jawab khusus yaitu sebagai
                        komunikator dalam menyampaikan dan menyebarluaskan kebijakan Bank Indonesia (front liners) dan
                        sebagai agen pembawa perubahan bagi masyarakat (agent of change).
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-m-layout-v2>
