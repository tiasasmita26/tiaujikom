<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoComment ;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PhotoCommentController extends Controller
{
    public function storeComment(Request $request, String $id)
{
    $validatedData = $request->validate([
        'comment_content' => 'required'
    ]);
    

    if(Auth::check()) {
        $user = Auth::user();
        $comment = new PhotoComment();
        $comment->photoId = $id;
        $comment->comment_content = $request->comment_content;
        $comment->date_of_comment = now(); 
        $comment->userId = auth()->user()->userId;
        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    } 
    }
}
    
