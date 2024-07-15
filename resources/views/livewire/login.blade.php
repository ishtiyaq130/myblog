<div class="max-w-md mx-auto bg-white p-6 shadow-lg rounded">
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (!$registerForm)
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" class="w-full p-2 border rounded" autocomplete="email">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password" class="w-full p-2 border rounded" autocomplete="current-password">
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded">Login</button>
            <a wire:click.prevent="toggleRegisterForm" class="text-blue-500 mt-3 cursor-pointer">Register if you dont have an account</a>
        </form>
    @else
        <h1 class="text-2xl font-bold mb-6 text-center">Registration Form</h1>
        <form wire:submit.prevent="registerStore">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" class="w-full p-2 border rounded" autocomplete="name">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" class="w-full p-2 border rounded" autocomplete="email">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role</label>
                <select id="role" wire:model="role" class="w-full p-2 border rounded">
                    <option value="">Select a Role</option>
                    <option value="0">Author</option>
                    <option value="1">Editor</option>
                </select>
                @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password" class="w-full p-2 border rounded" >
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-500 text-white p-2 rounded">Register</button>
            <a wire:click.prevent="toggleRegisterForm" class="text-blue-500 mt-3 cursor-pointer">If you have an account, login here!</a>
        </form>
    @endif
</div>
