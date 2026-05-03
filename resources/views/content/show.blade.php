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
<h1> Detail {{ $content->media_title }} </h1>
<h5>{{ $content->genre->genre_name }}</h5>
<audio controls>
<source src="{{ asset('uploaded/media/'.$content->media_file) }}" type="audio/mpeg">
</audio>
<p> {{ $content->credits }} </p>
<p> {{ $content->description }} </p>
</div>

@endsection