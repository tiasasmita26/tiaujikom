@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Tambah Album</h4>
        </div>
        <form method="post" action="/admin/album" class="mb-5" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Album</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" name="album_name" class="form-control">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="description">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button class="btn btn-primary">Publish</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection