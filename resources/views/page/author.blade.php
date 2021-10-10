<x-m-layout-v2>
    <style>
        .border-custom {
            position: relative;
            padding-left: 1rem;
        }

        .border-custom::after {
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            /* background-color: red; */
            border-left: 4px solid salmon;
        }

        .border-down {
            position: relative;
        }

        .border-down::after {
            content: "";
            width: 20%;
            height: 3px;
            position: absolute;
            left: 0;
            bottom: 0;
            background-color: rgb(250, 63, 63);

        }

    </style>
    <div class="mt-r p-5 mb-4 bg-dark text-light rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">Profile Author</h1>
            <p class="col-md-12 h4 text-warning">Disclamer :</p>
            <p class="col-md-12 h3 border py-2 px-2 text-center"> Website ini dibuat Oleh orang GenBI SULTRA sendiri, from scratch</p>
            <p class="h5 text-center py-4">"Jika berminat untuk bekerja sama atau ingin mengadakan kegiatan sosial bersama GenBI SULTRA silahkan Hubungi kontak berikut"</p>
            <div class="d-flex gap-2 border p-2 justify-content-center">
                <div class="h5">
                    <i class="fas fa-envelope text-light"></i>
                    genbisultra@gmail.com
                </div>
                <div class="h5">
                    <i class="fab fa-whatsapp text-success"></i> Mihmu 085394558472
                </div>


            </div>

        </div>

    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="card">
                    <img src="https://res.cloudinary.com/dz209s6jk/image/upload/q_auto:good,w_900/Challenges/dgmrkrfyzvyzwuwl7vac.jpg" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-6 py-3 px-3 shadow-sm">
                <div class="h1 border-down py-1 mb-3">About Me</div>

                <div class="h4 text-primary">Muhammad alfian izzah</div>
                <div class="h6">Mahasiswa Ilmu Komputer Universitas Halu Oleo</div>
                <div class="h6 text-muted">Kota Kendari, Sulawesi Tenggara, Indonesia</div>
                <div class="h4 border-custom mt-4">Tentang</div>

                <div style="text-align: justify" class=" text-muted">
                    I am a student (student) in computer science, my field is front end development and backend development, you can say fullstack but not full. and I'm still learning to become a full fullstack.
                    and a little of my experience. I've made a system and it's still a little bit about 10 full projects. and many projects fail, aka just learning😁😁
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-2">
            <div class="col-6">
                <div class="card">
                    <img src="https://res.cloudinary.com/dz209s6jk/image/upload/q_auto:good,w_900/Challenges/dgmrkrfyzvyzwuwl7vac.jpg" class="card-img-top" alt="...">
                </div>
            </div>
            <div class="col-6 py-3 px-3 shadow-sm ">
                <div class="h1 border-down py-1 mb-3">About Me</div>

                <div class="h4 text-primary">Muhammad alfian izzah</div>
                <div class="h6">Mahasiswa Ilmu Komputer Universitas Halu Oleo</div>
                <div class="h6 text-muted">Kota Kendari, Sulawesi Tenggara, Indonesia</div>
                <div class="h4 border-custom mt-4">Tentang</div>

                <div style="text-align: justify" class=" text-muted">
                    I am a student (student) in computer science, my field is front end development and backend development, you can say fullstack but not full. and I'm still learning to become a full fullstack.
                    and a little of my experience. I've made a system and it's still a little bit about 10 full projects. and many projects fail, aka just learning😁😁
                </div>
            </div>

        </div>
    </div>

</x-m-layout-v2>
