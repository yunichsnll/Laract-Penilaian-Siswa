@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>UPDATE DATA MENGAJAR</h2>
            <form action="/nilai/update/{{$nilai->id}}" method="POST">
            @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">GURU MAPEL</td>
                        <td class="bar">
                            <select name="mengajar_id" id="">
                                <option value=""></option>
                                @foreach ($mengajar as $n)
                                    <option value="{{ $n->id }}" 
                                @if ($n->id == $nilai->mengajar_id)
                                       selected
                                @endif>{{ $n->guru->nama_guru}}</option>
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
                                    <option value="{{ $n->id }}" 
                                @if ($n->id == $nilai->siswa_id)
                                       selected
                                @endif>{{ $n->nama_siswa}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UH</td>
                        <td class="bar">
                            <input type="number" name="uh" value="{{ $nilai->uh}}">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UTS</td>
                        <td class="bar">
                            <input type="number" name="uts" value="{{ $nilai->uts }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">UAS</td>
                        <td class="bar">
                            <input type="number" name="uas" value="{{ $nilai->uas }}">
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