@if ($blogs && count($blogs) > 0)
@foreach ($blogs as $blogs)
<div class="flex justify-center  mx-4">
    <div class="container mt-8 max-w-[36rem] mx-2 ml-4 dark:bg-gray-800">
        <div class="w-50 rounded overflow-hidden shadow-lg border border-grey-500">
            <img class=" w-full" src="{{ asset('storage/' . $blogs->thumbnail) }}" alt="Sunset in the mountains">
            <div class="px-6 py-4">
              <div class="font-bold text-2xl mb-2 text-white">Title - {{$blogs->title}}</div>
              <p class="text-white text-base">Auther - {{ $blogs->users ? $blogs->users->name : 'Unknown' }}</p>
              <p class="text-white  text-base">Category - {{ $blogs->category->category_name }}</p>
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
