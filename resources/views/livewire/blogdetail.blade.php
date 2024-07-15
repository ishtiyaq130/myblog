<!-- resources/views/livewire/blogdetail.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-lg rounded">
        <img class="w-full rounded" src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Blog Image">
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
    <form wire:click.prevent="create" class=" mt-8">
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6" wire:mode="comment"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required></textarea>
        </div>
        <button type="submit"
            class="mt-4 p-2 rounded dark:bg-gray-900 text-white">
            Post comment
        </button>
    </form>
    <section class="relative mt-8 border antialiased bg-white bg-gray-100 min-w-screen">
        <div class="container mx-auto">

            <div class="flex-col w-full mt-4 mx-auto bg-white  border sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm md:w-2/3">
                <div class="flex flex-row md-10">
                    <img class="w-10 h-10 border-2 border-gray-300 rounded-full" alt="Anonymous's avatar"
                        src="assets('images/th.jpeg')">
                    <div class="flex-col mt-1">
                        <div class="flex items-center flex-1 px-4 font-bold leading-tight">Anonymous
                            <span class="ml-2 text-xs font-normal text-gray-500">3 days ago</span>
                        </div>
                        <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600">Very cool! I'll have
                            to learn more about Tailwind.
                        </div>
                        <button class="inline-flex items-center px-1 pt-2 ml-1 flex-column">
                            <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                                viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                    fill-rule="nonzero" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

@endsection
