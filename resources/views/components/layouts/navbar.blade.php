<header class="bg-white px-[100px] py-4">
    <nav class="flex items-center justify-between gap-x-4">
        <a href="{{ route('home') }}" wire:navigate class="text-primary text-2xl font-bold">Galery</a>
        <div class="flex items-center gap-x-3">
            @auth
                <a href="{{ route('insert.foto') }}" wire:navigate class="bg-primary border border-primary px-6 py-2 rounded-md text-white text-base font-medium">
                    Upload Foto
                </a>
                <a href="{{ route('insert.album') }}" wire:navigate class="bg-white border border-primary px-6 py-2 rounded-md text-primary text-base font-medium">
                    Buat Album
                </a>
                @if (request()->is('profile'))
                    <a href="{{ route('logout') }}" wire:navigate class="bg-red-500 border border-red-500 px-6 py-2 rounded-md text-white text-base font-medium">
                        Logout
                    </a>
                @else
                    <a href="{{ route('profile') }}" wire:navigate class="flex items-center justify-center px-4 py-2 rounded-md bg-mist text-black text-base font-bold uppercase">
                        {{ substr(auth()->user()->username, 0, 1) }}
                    </a>
                @endif
                @else
                <a href="{{ route('login') }}" wire:navigate class="bg-primary border border-primary px-6 py-2 rounded-md text-white text-base font-medium">
                    Login
                </a>
                <a href="{{ route('register') }}" wire:navigate class="bg-white border border-primary px-6 py-2 rounded-md text-primary text-base font-medium">
                    Register
                </a>
            @endauth
        </div>
    </nav>

</header>