<?php

namespace App\Livewire;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public string $username = '';
    public string $email = '';
    public string $nama_lengkap = '';
    public string $alamat = '';
    public string $password = '';

    public $album = [];

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->email = auth()->user()->email;
        $this->nama_lengkap = auth()->user()->nama_lengkap;
        $this->alamat = auth()->user()->alamat;
        $this->album = Album::where('user_id', auth()->user()->id)->latest('tanggal')->get();
    }

    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore(auth()->user()->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user()->id, 'id')],
            'nama_lengkap' => ['string', 'max:255'],
            'alamat' => ['string'],
            'password' => ['min:5', 'string']
        ];
    }

    public function save()
    {
        $this->validate();

        if (!empty($this->password)) {
            User::find(auth()->user()->id)->update([
                'username' => $this->username,
                'email' => $this->email,
                'nama_lengkap' => $this->nama_lengkap,
                'alamat' => $this->alamat,
                'password' => Hash::make($this->password)
            ]);
        } else {
            User::find(auth()->user()->id)->update([
                'username' => $this->username,
                'email' => $this->email,
                'nama_lengkap' => $this->nama_lengkap,
                'alamat' => $this->alamat
            ]);
        }
    }

    public function like($foto_id)
    {
        $likeModel = new Like();
        $likeModel->onLike($foto_id);
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
