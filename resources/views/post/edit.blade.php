<form action="/posts/update{{ $hasil[0]['id'] }}" method="post">
    @csrf
    <label for="judl">Judul</label><br>
    <input type="text" id="judl" name="judul" class="judl" value="{{ $hasil[0]['judul'] }}">
    <br>
    <label for="desk">Deskripsi</label><br>
    <textarea id="desk" name="deskripsi" >{{ $hasil[0]['deskripsi'] }}</textarea>
    <br>
    <input type="submit" value="tambah">
</form>