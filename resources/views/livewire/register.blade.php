<x-slot:title>
    Register
</x-slot:title>

<main class="flex items-center justify-center h-screen">
    <form wire:submit="register()" class="p-10 bg-white rounded-md">
        <div class="space-y-3">
            <h1 class="text-primary text-[40px] font-bold">Registrasi</h1>
            <p class="text-black text-xl font-normal">registrasi untuk bisa masuk dan menikmati semua fitur</p>
        </div>
        <div class="mt-16 space-y-6">
            <div class="flex flex-col">
                <label for="username" class="text-black text-base font-semibold">username</label>
                <input type="username" wire:model="username" id="username" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required autocomplete="off">
                @error('username') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-black text-base font-semibold">email</label>
                <input type="email" wire:model="email" id="email" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required autocomplete="off">
                @error('email') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label for="password" class="text-black text-base font-semibold">password</label>
                <input type="password" wire:model="password" id="password" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required>
                @error('password') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col">
                <label for="confirm_password" class="text-black text-base font-semibold">confirm_password</label>
                <input type="password" wire:model="confirm_password" id="confirm_password" class="bg-white border border-primary rounded-md px-2 py-1 focus:outline focus:outline-1 focus:outline-primary" required>
                @error('confirm_password') <span class="text-red-600 text-sm font-normal indent-1">{{ $message }}</span> @enderror
            </div>
            <div class="space-y-6 mt-4">
                <button class="bg-primary text-white text-base font-medium px-4 py-1.5 rounded-md border border-primary w-full">
                    Register
                </button>
                <div class="border-t border-t-black pt-6">
                    <p class="text-black text-base font-normal text-center">
                        Sudah memiliki akun?
                        <a href="{{ route('login') }}" class="text-primary underline">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</main>
