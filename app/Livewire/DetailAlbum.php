<?php

namespace App\Livewire;

use App\Models\Foto;
use App\Models\Like;
use Livewire\Component;

class DetailAlbum extends Component
{
    public $photos = [];

    public function mount($id)
    {
        $this->photos = Foto::where('album_id', $id)->latest('tanggal')->get();
    }

    public function render()
    {
        return view('livewire.detail-album');
    }
}
