@extends('admin.main')
@section('content')

<div class="card">
    <div class="card-header">
    <a href="/admin/album/create" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> Tambah Album </a>
    </div>
    <br>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Album</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Tanggal Dibuat</th>
            <th scope="col">UserID</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($album as $album)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$album->album_name}}</td>
              <td>{{$album->description}}</td>
              <td>{{$album->date_created}}</td>
              <td>{{$album->userId}}</td>
              <td>
                <div class="btn-group" role="group">
                    <a href="/admin/album/{{ $album->albumId }}/edit" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>

                    <form action="/admin/album/{{ $album->albumId }}" method="POST" class="d-inline">
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
  </div>

@endsection