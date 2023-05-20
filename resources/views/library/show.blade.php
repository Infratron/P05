<x-layout>
     <div class="container my-5">
        <div class="row-justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{Storage::url($library->image)}}" alt="Foto di {{$library->name}}" class="img-fluid">
                <figcaption class="text-center small text-muted">{{$library->address}}</figcaption>
                <p class="fs-4 my-5" >{{$library->description}}</p>
                <hr>
                <p class="small">Inserito il: <span class="fst-italic">{{$library->created_at->format('d/m/Y')}}</span></p>
                <p class="small">Inserito da: <span class="fst-italic">{{$library->user->name}}</span></p>
                <hr>
                <a href="{{route('library.index')}}" class="btn btn-dark">Torna indietro</a>
            </div>
        </div>
     </div>
</x-layout>