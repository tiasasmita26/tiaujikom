@extends('admin.main')
@section('content')

<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Tambah Data Foto</h4>
                  </div>
                  <form method="post" action="/admin/data-photo" class="mb-5" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="photo_title" id="photo_title">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Foto</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="photo_description" id="photo_description">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi File</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" class="form-control " name="file_location" id="file_location">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Id</label>
                <div class="col-sm-12 col-md-7">
                  <select name="albumId" class="form-select">
                   <option disable value="">Pilih Album</option>
                   @foreach ($album as $item)
                       <option value="{{ $item->albumId }}">{{ $item->album_name }}</option>
                   @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button class="btn btn-primary">Publish</button>
            </div>
          </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            
            <script>
            function previewImage() {
                const image = document.querySelector('#photo_title');
                const imgPreview = document.querySelector('.img-preview');
            
                imgPreview.style.display = 'block';
            
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
            
                oFReader.onload = function(oFREvent) {
                  imgPreview.src = oFREvent.target.result;
                }
            }
            </script>

@endsection