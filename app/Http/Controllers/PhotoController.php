<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\PhotoComment;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $album = Album::all();
        $photo = Photo::all();
        return view('admin.data-photo.index', ['photo' => $photo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $album = Album::get();
        $photo = Photo::all();
        return view ('admin.data-photo.create', compact('album', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massages = [
            'required' => 'Silahkan isi kolom ini !',
            'max' => 'Tidak boleh lebih dari 100 karakter',
            'image' => 'Anda hanya dapat menambahkan gambar',
        ];

        $request->validate([
            'photo_title' => 'required|max:255',
            'photo_description' => 'required|max:255',
            'file_location' => 'image|required',
            'albumId' => 'required', 
        ], $massages);
        $tanggal = Carbon::now()->toDateTimeString();
        $photo = new Photo;
        $photo->photo_title = $request->photo_title;
        $photo->photo_description = $request->photo_description;
        $photo->file_location = $request->file_location;
        $photo->upload_date = $tanggal;
        $photo->albumId = $request->albumId;
        $photo['userId'] = auth()->user()->userId;

        if ($request->hasFile('file_location')) {
            $files = $request->file('file_location');
            $path = storage_path('app/public');
            $files_name = 'public' . '/' . date('Ymd') . '-' .
            $files->getClientOriginalName();
            $files->storeAs('public', $files_name);
            $photo->file_location = $files_name;
        }

        $photo->save();

        return redirect('/admin/data-photo')->with('success', 'tambah data sukses!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $photo = Photo::where('photoId',$id)->first();
        $like = Like::where('photoId', $id)->count();
        $photoId = $id;
        $comment = PhotoComment::where('photoId', $id)->get();
        return view('detail.index', compact(['photo', 'like', 'photoId', 'comment']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */ 
    public function edit(int $photoId)
    {
        $photo = Photo::where('photoId', $photoId)->first();
        $user = User::all();
        $album = Album::get();
        
    // Periksa jika album ditemukan
    if (!$photo) {
        abort(404); // Tampilkan halaman 404 jika album tidak ditemukan
    }

    return view('/admin.data-photo.edit', compact(['photo']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $photoId)
{
    $tanggal = Carbon::now()->toDateTimeString();
    
    $photo = Photo::where('photoId', $photoId)->first();
    
    $photo->photo_title = $request->photo_title;
    $photo->photo_description = $request->photo_description;
    $photo->albumId = $request->albumId;
    
    if ($request->hasFile('file_location')) {
        $file = $request->file('file_location');
        $path = storage_path('app/public');
        $file_name = 'public/' . date('Ymd') . '-' . $file->getClientOriginalName();
        $file->storeAs('public', $file_name);
        $photo->file_location = $file_name;
    }

    $photo->userId = auth()->user()->userId;

    $photo->save();

    return redirect('/admin/data-photo')->with('success', 'Photo telah diperbarui!');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($photoId)
    {
        Photo::destroy($photoId);
        return redirect('/admin/data-photo')->with('success','Data Berhasil Dihapus');
    }


}
