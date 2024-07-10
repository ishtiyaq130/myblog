<div class="pt-20">
    <div class="container mx-auto p-6">

        <!-- Table -->
        <div class="pt-20">
            <div class="container mx-auto p-6">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-fixed w-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auther</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($blog && count($blog) > 0)
                            @foreach ($blog as $post)
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$post->blog_id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$post->user_id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$post->title}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$post->category_id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$post->status}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Publish</a>
                                </td>
                            </tr>
                            @endforeach
                            @else

                        <h1>No blog</h1>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
