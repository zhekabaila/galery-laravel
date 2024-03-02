<?php

namespace App\Livewire;

use App\Models\Album;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InsertAlbum extends Component
{
    #[Validate('required|string|max:225')]
    public string $nama = '';

    #[Validate('nullable|string')]
    public string $deskripsi = '';

    public function save()
    {
        Album::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'tanggal' => now()->format('Y-m-d'),
            'user_id' => auth()->user()->id
        ]);

        $this->redirect('/', true);
    }

    public function render()
    {
        return view('livewire.insert-album');
    }
}
