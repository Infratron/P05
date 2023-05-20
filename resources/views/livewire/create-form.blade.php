<div>
    <form class="p-5 border shadow" wire:submit.prevent="store">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('libraryCreated'))
         <p class="alert alert-info">{{ Session::get('libraryCreated') }}</p>
        @endif

        @csrf

        <div>
            <label for="image" class="form-label">Foto libreria</label>
            <input type="file" wire:model="image" class="form-control" id="image">
        </div>

        @if ($image)
        <div class="mt-3 tex-center"></div>
        Prewiev Immagine:<br>
        <img width="250" src="{{$image->temporaryUrl()}}">
        @endif

        <div>
            <label for="name" class="form-label">Nome libreria</label>
            <input type="text" wire:model="name" class="form-control" id="name">
        </div>

         <div>
            <label for="address" class="form-label">Indirizzo libreria</label>
            <input type="text" wire:model="address" class="form-control" id="address">
         </div>

         <div class="mb-2">
            <label for="best-sellers" class="form-label my-2">I libri più venduti</label><br>
            <hr>
            @foreach($books as $book)
            <div class="display-flex">
                <input id="book_{{$book->id}}" type="checkbox" wire:model="best_sellers" value="{{$book->id}}">
                <label for="book_{{$book->id}}" class="ms-2">{{$book->title}} , {{$book->author}}<br></span>
            </div>
            @endforeach
            <hr>
         </div>

         <div>
             <label for="description" class="form-label">Descrizione Libreria</label>
             <textarea wire:model="description" id="description" cols="30" rows="7" class="form-control shadow"></textarea>
         </div>

        <button type="submit" class="btn btn-primary my-2">Inserisci libreria</button>
        <a href="{{route('library.index')}}" class="btn btn-dark mx-2 my-2">Torna indietro</a>
      </form>
</div>
