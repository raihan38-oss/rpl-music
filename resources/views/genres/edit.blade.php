@extends('template.main')  
@section('content')

<header class="header">
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Cari Data">
            </div>
            <div class="header-action">
                <a href="{{ route('genres.create') }}" class="btn primary">📊 Add Data</a>
            <div>
                {{ auth()->user()->name }}
            </div>
            </div>
</header>


<h1>Edit</h1>
<form action="{{ route('genres.update', $genre->id) }}" method="post">
    @csrf
    @method('PUT')

    <label>Genre Name</label>
    <input type="text" name="genre_name" class="form-input"
        value="{{ old('genre_name', $genre->genre_name) }}">

    @error('genre_name')
        <span style="color:red">{{ $message }}</span>
    @enderror

    <br>

    <label>Description</label>
    <input type="text" name="description" class="form-input"
        value="{{ old('description', $genre->description) }}">

    @error('description')
        <span style="color:red">{{ $message }}</span>
    @enderror

    <br>
    <br>
    <button class="btn primary" type="submit">Simpan</button>
</form>

@endsection
