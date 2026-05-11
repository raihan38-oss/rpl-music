@extends('template.main')  
@section('content')

<header class="header">
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Cari Data">
            </div>
            <div class="header-action">
                <a href="{{ route('content.create') }}" class="btn primary">📊 Add Data</a>
            <div>
                {{ auth()->user()->name }}
            </div>
            </div>
</header>


<h1>Edit Content</h1>
<form action="{{ route('content.update', $content->id) }}" method="post" enctype="multipart/form-data">
@csrf
@METHOD('PUT')
<div class="form-group">
<label for="title">Media Title :</label>
<input type="text" name="media_title" id="media_title" value="{{ old('media_title', $content->media_title) }}" class="form-input">
</div>

<div class="form-group">
    <label for="genre">Genre :</label>
    <select name="genre_id" id="genre_id">
        @foreach ($genre as $genreRow)
            <option value="{{ $genreRow->id}}">{{ $genreRow->genre_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="description">Description :</label>
    <textarea name="description" id="description" cols="30" rows="3" class="form-input">{{ old('description', $content->description)}} </textarea>
    @error('description')
        {{ $message }}
    @enderror
</div>
<br>
<div class="form-group">
    *tambahkan lagu jika ingin mengganti lagu
    <br>
    <label for="media_file">Media File :</label>
    <input type="file" name="media_file" id="media_file">
    @error('media_file')
        {{ $message }}
    @enderror
</div>

<button type="submit">Save</button>
</form>

@endsection