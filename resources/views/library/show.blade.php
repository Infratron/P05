<x-layout>
     <div class="container my-5">
        <div class="row-justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{Storage::url($library->image)}}" alt="Foto di {{$library->name}}" class="img-fluid">
                <figcaption class="text-center small text-muted">{{$library->address}}</figcaption>
                <p class="fs-4 my-5" >{{$library->description}}</p>
                <hr>
                <p class="small">Inserito il: <span class="fst-italic">{{$library->created_at->translatedFormat('d/m/Y')}}</span></p>
                <p class="small">Inserito: <span class="fst-italic">{{$library->created_at->diffForHumans()}}</span></p>
                <p class="small">Inserito da: <span class="fst-italic">{{$library->user->name}}</span></p>
                <hr>
                @if(count($library->books))
                        <ul>
                            @foreach($library->books as $book)
                            <li>"{{$book->title}}" scritto da {{$book->author}}</li>
                            @endforeach
                        </ul>
                        <hr>
                @endif
                <a href="{{route('library.index')}}" class="btn btn-dark">Torna indietro</a>
                @if(Auth::user() && Auth::user()-> id == $library->user_id)
                <a href="{{route('library.edit', compact('library'))}}" class="btn btn-danger">Modifica</a>
                @endif
            </div>
        </div>
     </div>
</x-layout>