<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditForm extends Component
{
    use WithFileUploads;
    public $library;
    public $name, $address, $image, $description, $old_image;
    public $best_sellers = [];

    public function updateImage(){
        $this->validate([
            'image' => 'image|max:1024'
        ]);
    }

    public function update(){
        $this->library->update([
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
        ]);

        if($this->image){
            $this->library->update([
                'image'=> $this->image->store('public/images'),
            ]);
            Storage::delete($this->old_image);
            $this->old_image = $this->image->temporaryUrl();
            $this->reset('image');
        }
        $this->library->books()->sync($this->best_sellers);
        
        session()->flash('LibraryUpdated', 'Hai aggiornato correttamente la libreria');
    }

    public function destroy(){
        // @dd($this->all());
        $this->library->books()->detach();
        Storage::delete($this->old_image);
        $this->library->delete();

        session()->flash('LibraryDeleted', 'Hai cancellato correttamente la libreria');
        return redirect(route('library.index'));
    }

    public function mount(){
        $this->name = $this->library->name;
        $this->address = $this->library->address;
        $this->old_image = $this->library->image;
        $this->description = $this->library->description;
        $this->best_sellers = $this->library->books->pluck('id');
    }

    public function render()
    {
        $books = Book::all();
        return view('livewire.edit-form', compact('books'));
    }
}
