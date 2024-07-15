@if ($blogs && count($blogs) > 0)
@foreach ($blogs as $blogs)
<div class="flex flex-row space-x-4 mx-4">
    <div class="container mt-8 max-w-[12rem] mx-2 ml-4">
        <div class="w-50 rounded overflow-hidden shadow-lg border border-grey-500">
            <img class=" w-full" src="{{ asset('storage/' . $blogs->thumbnail) }}" alt="Sunset in the mountains">
            <div class="px-6 py-4">
              <div class="font-bold text-2xl mb-2">{{$blogs->title}}</div>
              <p class="text-gray-700 text-base">{{ $blogs->users->name }}</p>
              <p class="text-gray-700  text-base">{{ $blogs->category->category_name }}</p>
              <div class="container mt-4">
              <a href="{{ route('blogs.show', ['id' => $blogs->blog_id]) }}" class=" border border-grey-500 m-4 py-2 px-3 rounded leading-tight text-white dark:bg-gray-800">Read</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<h1>no blogs</h1>
@endif

