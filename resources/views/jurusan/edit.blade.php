@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>UPDATE DATA JURUSAN</h2>
            <form action="/jurusan/update/{{$jurusan->id}}"  method="POST">
            @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">NAMA JURUSAN</td>
                        <td class="bar">
                            <input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><button class="button-primary" type="submit">EDIT</button></center>
                        </td>
                    </tr>
                </table>
            </form>
    </center>
@endsection