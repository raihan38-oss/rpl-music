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
<div>
    
    

    <h1>Content</h1>
    <a href="{{ route('content.create') }}">Create</a>
    <table border="1">
        <thead>
            <th>No</th>
            <th>Title</th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Description</th>
            <th>Action</th>
        </thead>

        <tbody>
            @foreach($content as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->media_title }}</td>
                <td>{{ $row->credits }}</td>
                <td>{{ $row->genre->genre_name }}</td>
                <td>{{ $row->description }}</td>
                <td>
                    <form action="{{ route('content.destroy', $row->id) }}" method="post" onsubmit="return confirm('Apakah Ingin menghapus data?')">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('content.edit', $row->id) }}">Edit</a>
                        <a href="{{ route('content.show', $row->id) }}">Detail</a>
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection