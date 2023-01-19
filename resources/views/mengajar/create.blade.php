@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>TAMBAH DATA MENGAJAR</h2>
            <form action="/mengajar/store" method="POST">
            @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">GURU</td>
                        <td class="bar">
                            <select name="guru_id" id="">
                                <option value=""></option>
                                @foreach ($guru as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_guru}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">MATA PELAJARAN</td>
                        <td class="bar">
                            <select name="mapel_id" id="">
                                <option value=""></option>
                                @foreach ($mapel as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_mapel}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">KELAS</td>
                        <td class="bar">
                            <select name="kelas_id" id="">
                                <option value=""></option>
                                @foreach ($kelas as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_kelas}}</option>
                                @endforeach
                            </select>
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