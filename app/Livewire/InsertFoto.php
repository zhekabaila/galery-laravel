<?php

namespace App\Livewire;

use App\Models\Foto;
use Livewire\Component;
use Livewire\WithFileUploads;

class InsertFoto extends Component
{
    use WithFileUploads;

    public string $judul = '';
    public string $deskripsi = '';
    public $lokasi_file;
    public $album_id;

    public function save_foto()
    {
        $this->validate([
            'judul' => 'required|string|max:225',
            'deskripsi' => 'string',
            'lokasi_file' => 'required|image',
            'album_id' => 'required|exists:album,id',
        ]);

        $response = $this->lokasi_file->store(path: 'public');

        $isSaved = Foto::create([
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'tanggal' => now()->format('Y-m-d'),
            'lokasi_file' => $response,
            'album_id' => $this->album_id,
            'user_id' => auth()->user()->id
        ]);

        if ($isSaved) {
            $this->redirect('/', true);
        }
    }

    public function render()
    {
        return view('livewire.insert-foto');
    }
}
