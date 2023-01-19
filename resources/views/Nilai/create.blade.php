@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>TAMBAH DATA NILAI</h2>
            <form action="/nilai/store" method="POST">
            @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">GURU MAPEL</td>
                        <td class="bar">
                            <select name="mengajar_id" id="">
                                <option value=""></option>
                                @foreach ($mengajar as $n)
                                    <option value="{{ $n->id }}">{{ $n->guru->nama_guru}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">NAMA SISWA</td>
                        <td class="bar">
                            <select name="siswa_id" id="">
                                <option value=""></option>
                                @foreach ($siswa as $n)
                                    <option value="{{ $n->id }}">{{ $n->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UH</td>
                        <td class="bar">
                            <input type="number" name="uh">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UTS</td>
                        <td class="bar">
                            <input type="number" name="uts">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UAS</td>
                        <td class="bar">
                            <input type="number" name="uas">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><button class="button-primary" type="submit">SIMPAN</button></center>
                        </td>
                    </tr>
                </table>
            </form>
    </center>
@endsection