<x-dash-layout>
    <div class="container px-5">
        <div class="row">
            <h1>Anggota GenBI SULTRA</h1>
        </div>
        <div class="row py-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th class="table-responsif" scope="col">Universitas</th>
                        <th class="table-responsif" scope="col">Jurusan</th>
                        <th class="table-responsif" scope="col">Foto pengenal</th>
                        <th scope="col">Surat Pernyataan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $dt)
                        {{-- {{ dd($dt->status) }} --}}

                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $dt->user->profile->nama }}</td>
                            <td class="table-responsif">{{ $dt->status->komsat->nama }}</td>
                            <td class="table-responsif">
                                {{ $dt->fakultas . '~' . $dt->jurusan . '(' . $dt->angkatan . ')' }}</td>
                            <td class="table-responsif">

                                <img onerror="this.onerror=null;this.src='img/notfound.png';" style="width: 100px"
                                    src="{{ asset("storage/$dt->foto_pengenal") }}" alt="tesssssssssss"
                                    class="img-thumbnail">
                            </td>
                            <td><a href="{{ asset("storage/$dt->BAgreement") }}">Show</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            {{ $datas->links() }}
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</x-dash-layout>
