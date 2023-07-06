<form action="posts/store/" method="post">
    @csrf
    <label for="judl">Judul</label><br>
    <input type="text" placeholder="masukkan judul" id="judl" name="judul" class="judl">
    <br>
    <label for="desk">Deskripsi</label><br>
    <textarea placeholder="masukkan deskripsi" id="desk" name="deskripsi"></textarea>
    <br>
    <input type="submit" value="tambah">
</form>

<table border="1" >
    <?php
        $no = 1;
    ?>
    <tr>
        <th>No</th>
        <th>judul</th>
        <th>deskripsi</th>
        <th>Aksi</th>
    </tr>
    
@foreach ($hasil  as $data)
    <tr>
        <td>{{ $no }}</td>
        <td>{{ $data['judul'] }}</td>
        <td>{{ $data['deskripsi'] }}</td>
        <td>
            <a href="/posts/edit{{ $data['id'] }}">edit</a>
            <a href="/posts/hapus{{ $data['id'] }}" onclick="return confirm('Ingin menghapus data?')">hapus</a>
        </td>
    </tr>
    <?php
        $no++
    ?>
@endforeach

</table>

