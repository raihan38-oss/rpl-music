@extends('template.main') 

@section('content')

<header class="header">
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Cari Data">
            </div>
            <div class="header-action">
                <a href="{{ route('user.create') }}" class="btn primary">🎼Genre</a>
            <div>
                {{ auth()->user()->name }}
            </div>
            </div>
        </header>
    

<h1>Index</h1>
<a href="{{ route('user.create') }}">Create now</a>
<table border="1">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($genres as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td> {{ $row->name}}</td>
                <td>{{ $row->email}}</td>
                <td>{{ $row->password}}</td>
                <td>
                    <form action="{{ route('user.destroy',$row->id) }}" onsubmit="return confirm('Apakah yakin ingin mengahpaus data ini')" method="post">
                        @csrf 
                        @method('DELETE')
                        <a href="{{ route('user.edit', $row->id) }}">Edit</a>
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
