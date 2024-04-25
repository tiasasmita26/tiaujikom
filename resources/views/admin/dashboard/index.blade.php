@extends('admin.main')
@section('content')
<h1>Selamat Datang {{ Auth::user()->username }}</h1>
@endsection