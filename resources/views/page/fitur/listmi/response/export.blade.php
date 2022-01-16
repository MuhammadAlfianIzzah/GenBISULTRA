<h1>laporan {{ $respons[0]->listNote->title }}</h1>
<table style="border: 2px solid black">
    <thead>
        <tr>
            <th style="border: 4px solid black;font-weight: bold">Nama</th>
            <th style="border: 4px solid black;font-weight: bold">Fakultas</th>
            <th style="border: 4px solid black;font-weight: bold">jurusan</th>
            <th style="border: 4px solid black;font-weight: bold">Jawaban</th>
            <th style="border: 4px solid black;font-weight: bold">Screenshot</th>
            <th style="border: 4px solid black;font-weight: bold">Created at</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($respons as $respon)
            <tr>
                <td>{{ $respon->user->name }}</td>
                <td>{{ $respon->user->penerima->fakultas ?? 'kosong' }}</td>
                <td>{{ $respon->user->penerima->jurusan ?? 'kosong' }}</td>
                <td>{{ $respon->jawaban }}</td>
                <td><a href="{{ asset("storage/$respon->uploadfile") }}">Link</a></td>
                <td>{{ $respon->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
