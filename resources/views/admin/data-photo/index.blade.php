@extends('admin.main')
@section('content')

<div class="card">
    <div class="card-header">
        <a href="/admin/data-photo/create" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> Tambah Foto </a>
    </div>
        <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Foto</th>
                <th scope="col">Deskripsi Foto</th>
                <th scope="col">Tanggal Unggah</th>
                <th scope="col">Lokasi File</th>
                <th scope="col">Album ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($photo as $photo)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$photo->photo_title}}</td>
              <td>{{$photo->photo_description}}</td>
              <td>{{$photo->upload_date}}</td>
              <td>{{$photo->file_location}}</td>
              <td>{{$photo->albumId}}</td>
              <td>{{$photo->userId}}</td>
              <td>
                <div class="btn-group" role="group">
                    <a href="/admin/data-photo/{{ $photo->photoId }}/edit" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>

                    <form action="/admin/data-photo/{{ $photo->photoId }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger" onclick="return confirm('Yakin akan dihapus??')"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
                </td>
            </tr>
            @endforeach
            </tbody>    
        </table>
        </div>
</div>
@endsection
