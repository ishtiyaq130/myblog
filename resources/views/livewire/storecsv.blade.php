<div class="conatainer mt-8">
        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif

        @if (session()->has('error'))
            <div>{{ session('error') }}</div>
        @endif
    <div class="mt-4 mb-4 text-green text-xl">upload csv file</div>
    <div>
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            @csrf
            <label for="file_input">Upload file</label><br>
            <input class="border" type="file" wire:model="csv" id="file_input">
            @error('csv') <span class="error">{{ $message }}</span> @enderror
            <button type="submit" class="bg-blue-500 bg-green-700 text-white font-bold py-2 px-4 rounded">Upload</button>
        </form>

        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
    </div>

</div>
