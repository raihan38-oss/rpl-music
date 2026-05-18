@extends('template.main')  
@section('content')

<header class="header">
    <div class="search-bar">
        <input type="text" name="search" id="search" placeholder="Cari Data">
    </div>
    <div class="header-action">
        <a href="{{ route('user.index') }}" class="btn primary">📊 Kembali</a>
        <div>
            {{ auth()->user()->name }}
        </div>
    </div>
</header>

<h1>Edit User</h1>

<form action="{{ route('user.update', ['kelola_user' => $user->id]) }}" method="post">
    @csrf
    @method('PUT') <div>
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" class="form-input" value="{{ old('name', $user->name) }}">
        @error('name')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    
    <br>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ old('email', $user->email) }}">
        @error('email')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    
    <br>
    
    <div>
        <label for="password">Password Baru (Kosongkan jika tidak ingin diubah):</label>
        <input type="password" name="password" id="password" class="form-input">
        
        <div>
            <input type="checkbox" id="show-password" onclick="togglePassword()">
            <label for="show-password">Lihat Password</label>
        </div>

        @error('password')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    
    <br>
    
    <button class="btn primary" type="submit">Perbarui Data</button>    
</form>


@endsection