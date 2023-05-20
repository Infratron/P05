<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            @if(Session::has('LibraryDeleted'))
            <p class="alert alert-info">{{ Session::get('LibraryDeleted') }}</p>
           @endif
            @forelse($libraries as $library)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($library->image)}}" class="card-img-top" alt="Foto di {{$library->name}}">
                    <div class="card-body">
                      <h5 class="card-title">{{$library->name}}</h5>
                      <p class="card-text fst-italic text-muted">{{$library->address}}</p>
                      <a href="{{route('library.show', compact('library'))}}" class="btn btn-dark mt-3">Scopri di più</a>
                    </div>
                  </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Non sono state inserite librerie</p>
                <a href="{{route('library.create')}}" class="btn btn-dark">Inserisci la tua!</a>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
