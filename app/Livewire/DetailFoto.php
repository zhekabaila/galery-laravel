<?php

namespace App\Livewire;

use App\Models\Foto;
use App\Models\Komentar;
use App\Models\Like;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DetailFoto extends Component
{
    public $foto = null;

    #[Validate('required|string')]
    public $isi_komentar = '';

    public function mount($id)
    {
        $this->foto = Foto::find($id);
    }

    public function like($foto_id)
    {
        $likeModel = new Like();
        $likeModel->onLike($foto_id);
    }

    public function save($foto_id)
    {
        $this->validate();

        Komentar::create([
            'isi_komentar' => $this->isi_komentar,
            'tanggal' => now()->format('Y-m-d'),
            'foto_id' => $foto_id,
            'user_id' => 1
        ]);

        $this->reset('isi_komentar');
    }

    public function render()
    {
        return view('livewire.detail-foto');
    }
}
