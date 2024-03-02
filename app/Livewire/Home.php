<?php

namespace App\Livewire;

use App\Models\Foto;
use App\Models\Like;
use Livewire\Attributes\Url;
use Livewire\Component;

class Home extends Component
{
    public $photos = [];

    #[Url]
    public $orderby = 'terpopuler';

    public function mount()
    {
        $this->photos = $this->orderby == 'terbaru' ? Foto::orderByDesc('id')->get() : Foto::withCount('like')->orderByDesc('like_count')->get();
    }

    public function like($foto_id)
    {
        $likeModel = new Like();
        $likeModel->onLike($foto_id);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
