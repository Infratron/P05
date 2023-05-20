<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateForm extends Component
{
    use WithFileUploads;
    public $name, $address, $image, $description;

    public function updateImage(){
        $this->validate([
            'image' => 'image|max:1024',
        ]);
    }
    public function store(){
       Auth::user()->libraries()->create([
            'image' => $this->image->store('public/images'),
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,

        ]);
        session()->flash('libraryCreated', 'Hai inserito correttamente una libreria');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-form');
    }
}
