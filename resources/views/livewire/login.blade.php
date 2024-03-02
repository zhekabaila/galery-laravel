<x-slot:title>
    Login
</x-slot:title>

<main class="flex items-center justify-center h-screen">
    <form wire:submit="login()" class="p-10 bg-white rounded-md">
        <div class="space-y-3">
            <h1 class="text-primary text-[40px] font-bold">Login</h1>
            <p class="text-black text-xl font-normal">login sekarang untuk menikmati semua fitur</p>
        </div>
        <div class="mt-16">
            <div class="flex flex-col">
                <label for="email" class="text-black text-base font-semibold">email</label>
                <input type="email" wire:model="email" id="email" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required autocomplete="email" autofocus>
                @error('email') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col mt-6">
                <label for="password" class="text-black text-base font-semibold">password</label>
                <input type="password" wire:model="password" id="password" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required>
                @error('password') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex items-center gap-x-3 mt-4">
                <input type="checkbox" wire:model="remember_me" id="remember_me" class="accent-primary size-3.5" checked>
                <label for="remember_me" class="text-black text-base font-normal">remember me?</label>
            </div>
            <div class="space-y-6 mt-4">
                <button class="bg-primary text-white text-base font-medium px-4 py-1.5 rounded-md border border-primary w-full">
                    Login
                </button>
                <div class="border-t border-t-black pt-6">
                    <p class="text-black text-base font-normal text-center">
                        Belum memiliki akun?
                        <a href="{{ route('register') }}" class="text-primary underline">Registrasi</a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</main>
