<div class="pt-20">
    <div class="container mx-auto p-6">
        @if ($check == true)
        <!-- Filtering Controls -->
        <div class="flex items-center space-x-4 mb-4">
            <!-- Filter by Author -->
            <div class="relative">
                <select wire:model="selectedAuthor" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <option value="">Filter by Author</option>
                    @foreach ($users as $user)
                        @if ($user->role == 0)
                            <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('selectedAuthor')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative">
                <select wire:model="selectedCategory" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <option value="">Filter by Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="relative">
                <input type="text" wire:model="search" placeholder="Search by Title" class="block w-full appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
            </div>

            @if (App\Helpers\RoleHelper::can(Auth::user()->role, 'create'))
            <div class="relative">
                <a href="{{ url('/create') }}" class="border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Create</a>
            </div>
            @endif

        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class=" table-fixed w-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="#" wire:click.prevent="sortBy('publish_at')">
                                Publish Date
                                @if ($sortField == 'publish_at')
                                    @if ($sortDirection == 'asc')
                                        <span>&uarr;</span>
                                    @else
                                        <span>&darr;</span>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($blogs && count($blogs) > 0)
                        @foreach ($blogs as $blog)
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $i++}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $blog->users->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $blog->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $blog->category->category_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">@if ($blog->status == 1)
                                    {{ \Carbon\Carbon::parse($blog->publish_at)->format('d-m-Y') }}
                                @endif
                            </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    @if ($blog->status == 0)
                                        {{ 'Unpublish' }}
                                    @else
                                        {{ 'Publish' }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <button wire:click="update({{$blog->blog_id }})" class="border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</button>
                                    @if (App\Helpers\RoleHelper::can(Auth::user()->role, 'delete'))
                                    <button wire:click="delete({{ $blog->blog_id }})" wire:confirm="Are you sure you want to delete this project?" class="border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Delete</button>
                                    @endif

                                    <div wire:loading wire:target="delete({{ $blog->blog_id }})">
                                        deleting...
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">No blogs found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
            @else
            <livewire:editblog :u_id="$u_id" :user_id="$user_id" :category_id="$category_id" :title="$title" :content="$content" :thumbnail="$thumbnail" :status="$status"/>
            @endif

        </div>
    </div>
</div>
