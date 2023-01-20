@extends('main.layout')
@section('content')
    <center>
        <b>
            <h2>LIST DATA NILAI</h2>
            @if (session('user')->role == 'guru')
                <a href="/nilai/create" class="button-primary">Tambah Data</a>
            @endif
            
            @if (session('success'))
                <p class="text-success">{{session('success')}}</p>
            @endif
            <table cellPadding="10">
                <tr>
                    <th>NO</th>
                    <th>GURU-MAPEL-KELAS</th>
                    <th>NAMA SISWA</th>
                    <th>ULANGAN HARIAN</th>
                    <th>ULANGAN TENGAH SEMESTER</th>
                    <th>ULANGAN AKHIR SEMESTER</th>
                    <th>NILAI AKHIR</th>
                    @if (session('user')->role == 'guru')
                        <th>ACTION</th>
                    @endif
                </tr>
                @foreach ($nilai as $n)
                    <tr>
                        <td><center>{{ $loop->iteration }}</center></td>
                        <td><center>{{ $n->mengajar->guru->nama_guru}} - {{ $n->mengajar->mapel->nama_mapel }} - {{ $n->mengajar->kelas->nama_kelas }}</center></td>
                        <td><center>{{ $n->siswa->nama_siswa}}</center></td>
                        <td><center>{{ $n->uh}}</center></td>
                        <td><center>{{ $n->uts}}</center></td>
                        <td><center>{{ $n->uas}}</center></td>
                        <td><center>{{ $n->na}}</center></td>
                        @if (session('user')->role == 'guru')
                        <td>
                            <center>
                            <a href="/nilai/edit/{{$n->id}}" class="button-warning">EDIT</a><br>
                            <a href="/nilai/destroy/{{$n->id}}" class="button-danger" onclick="return confirm('yakin ingin menghapus data?')">HAPUS</a>
                            <center>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </b>
    </center>
@endsection