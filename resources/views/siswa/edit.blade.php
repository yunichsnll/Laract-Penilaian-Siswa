@extends('main.layout')
@section('content')
    <center>
        <br>
            <h2>UPDATE DATA SISWA</h2>
            <form action="/siswa/update/{{$siswa->id}}" method="POST">
            @csrf
                <table width="50%">
                    <tr>
                        <td class="bar">NIS</td>
                        <td class="bar">
                            <input type="text" name="nis" value="{{ $siswa->nis }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar"> NAMA SISWA</td>
                        <td class="bar">
                            <input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}">
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">JENIS KELAMIN</td>
                        <td class="bar">
                            <input type="radio" name="jk" value="L" {{ $siswa->jk =='L' ? 'checked' : ' '}}>Laki-laki
                            <input type="radio" name="jk" value="P" {{ $siswa->jk =='P' ? 'checked' : ' '}}>Perempuan
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">ALAMAT</td>
                        <td class="bar">
                            <textarea name="alamat" cols="30" rows="5">{{ $siswa->alamat }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">KELAS</td>
                        <td class="bar">
                            <select name="kelas_id" id="">
                                <option value=""></option>
                                @foreach ($kelas as $s)
                                    <option value="{{ $s->id }}" 
                                @if ($s->id == $siswa->kelas_id)
                                       selected
                                @endif>{{ $s->nama_kelas}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="bar">PASSWORD</td>
                        <td class="bar">
                            <input type="text" name="password" value="{{ $siswa->password }}">
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