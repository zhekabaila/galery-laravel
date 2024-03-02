<?php

namespace App\Livewire;

use Livewire\Component;

class PostCard extends Component
{
    public $data = null;

    public function mount($data = null)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
