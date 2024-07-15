<div class="container mx-auto p-6">
        <h1 class="ml-4 text-2xl font-bold mb-6">Create a New Blog Post</h1>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
         @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <form wire:submit.prevent="save" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="">
            <label for="title" class="block text-gray-700 text-sm font-bold">Title</label>
            <input type="text" wire:model="title" id="title" required
                   class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   placeholder="Enter the title of your blog">
                   @error('title')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
        </div>
        <div class="mt-4">
            <label for="thumbnail" class="block text-gray-700 text-sm font-bold">Upload Thumbnail</label>
            <input type="file" wire:model="thumbnail" id="thumbnail" required
                   class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   placeholder="Enter the title of your blog">
                   @error('thumbnail')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
        </div>
        <div class="mt-4">
            <label for="content" class="block text-gray-700 text-sm font-bold">Content</label>
            <textarea wire:model="content" id="content" required rows="10"
                      class="mt-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                      placeholder="Enter the content of your blog"></textarea>
                      @error('content')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
        </div>

        <div class="mt-4">
            <label for="user_id" class="block text-gray-700 text-sm font-bold">Auther</label>
            <select wire:model="user_id" id="user_id" required
            class="mt-2 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="">Select an author</option>
            @foreach ($users as $user)
                @if ($user->role == 0)
                    <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                @endif
            @endforeach
            </select>
            @error('user_id')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <label for="category_id" class="block text-gray-700 text-sm font-bold">Category</label>
            <select wire:model="category_id" id="category_id" required
                    class="mt-2 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select an category</option>
                    @foreach ($category as $category )
                    <option value="{{$category->category_id}}">{{ $category->category_name }}</option>
                    @endforeach
                @error('category')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </select>
        </div>
        <div class="container">
            <button type="submit" class="mt-4 p-2 rounded dark:bg-gray-900 text-white">Submit</button>
        </div>
    </form>
</div>
