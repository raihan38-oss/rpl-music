@extends('template.main') 

@section('content')

<header class="header">
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Cari Data">
            </div>
            <div class="header-action">
                <a href="{{ route('genres.create') }}" class="btn primary">🎼Genre</a>
            <div>
                {{ auth()->user()->name }}
            </div>
            </div>
        </header>
    

<h1>Index</h1>
<a href="{{ route('genres.create') }}">Create now</a>
<table border="1">
    <thead>
        <th>No</th>
        <th>Nama Genre</th>
        <th>Deskripsi</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($genres as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $row->genre_name}}</td>
                <td>{{ $row->description}}</td>
                <td>
                    <form action="{{ route('genres.destroy',$row->id) }}" onsubmit="return confirm('Apakah yakin ingin mengahpaus data ini')" method="post">
                        @csrf 
                        @method('DELETE')
                        <a href="{{ route('genres.edit', $row->id) }}">Edit</a>
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
