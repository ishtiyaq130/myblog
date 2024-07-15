<!-- resources/views/livewire/blogdetail.blade.php -->
<div>
    <div class="container mx-auto mt-8">
        <div class="max-w-2xl mx-auto bg-white p-6 shadow-lg rounded">
            <img class="w-full border rounded" src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Blog Image">
            <h1 class="text-2xl">Title- {{ $blog->title }}</h1>
            <p class="text-lg text-gray-700 mt-2">Auther- {{ $blog->users->name }}</p>
            <p class="text-lg text-gray-700 mt-2">Category- {{ $blog->category->category_name }}</p>
            <p class="text-gray-700 mt-4">{{ $blog->content }}</p>
        </div>
    </div>

    <div class="container mt-8">
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
        @if ($isLogged)
        <form wire:submit.prevent="save" class=" mt-8">
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6" wire:model="comment"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Write a comment..." required></textarea>
                    @error('comment') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="mt-4 p-2 rounded dark:bg-gray-900 text-white">
                Post comment
            </button>
        </form>
        @else
        <p class="text-center text-lg text-current">Please Login to comment!</p>
        @endif

        @foreach ($comments as $comment)

        <section class="relative mt-8 border antialiased bg-white dark:bg-gray-800 min-w-screen">
                <div class=" w-full mt-4 dark:bg-gray-800 sm:rounded-lg sm:shadow-sm md:w-2/3">
                    <div class="flex">
                        <img class="w-10 h-10 border-2 ml-4 border-gray-300 rounded-full" alt="Anonymous's avatar"
                            src="{{ asset('images/th.jpeg') }}">
                        <div class="flex-col">
                            <div class="flex items-center text-white flex-1 ml-4 font-bold leading-tight">{{ $comment->user->name }}
                                <span class="ml-2 text-xs  text-white font-normal text-gray-500">{{$comment->created_at->format('Y-m-d') }}</span>
                            </div>
                            <div class="flex-1  ml-4 text-sm  text-white font-medium leading-loose text-gray-600">
                                {{$comment->comment}}
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        @endforeach


    </div>
</div>
