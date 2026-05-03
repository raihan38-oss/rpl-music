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
    <h1>dashboard {{ Auth::user()->role }}</h1>
    <p>Selamat datang {{ Auth::user()->name }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn primary" type="submit">logout</button>
    </form>
</div>
@endsection