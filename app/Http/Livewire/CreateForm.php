<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateForm extends Component
{
    use WithFileUploads;
    public $name, $address, $image, $description;
    public $best_sellers = [];

    public function updateImage(){
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }
    public function store(){
      $library = Auth::user()->libraries()->create([
            'image' => $this->image->store('public/images'),
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,

        ]);

        $library->books()->attach($this->best_sellers);
        
        session()->flash('libraryCreated', 'Hai inserito correttamente una libreria');
        $this->reset();
    }

    public function render()
    {   $books = Book::all();
        return view('livewire.create-form', compact('books'));
    }
}
