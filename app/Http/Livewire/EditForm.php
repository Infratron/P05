<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditForm extends Component
{
    use WithFileUploads;
    public $library;
    public $name, $address, $image, $description, $old_image;

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
        
        session()->flash('LibraryUpdated', 'Hai aggiornato correttamente la libreria');
    }

    public function destroy(){
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
    }

    public function render()
    {
        return view('livewire.edit-form');
    }
}
