<div class="pt-20">
    <div class="container mx-auto p-6">

        <!-- Filtering Controls -->
        <div class="flex items-center space-x-4 mb-4">
            <!-- Filter by Author -->
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <option value="">Filter by Author</option>
                    <option value="author1">Author 1</option>
                    <option value="author2">Author 2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <!-- Filter by Category -->
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <option value="">Filter by Category</option>
                    <option value="category1">Category 1</option>
                    <option value="category2">Category 2</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <!-- Search by Title -->
            <div class="relative">
                <input type="text" placeholder="Search by Title" class="block w-full appearance-none bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
            </div>
            <!-- Sort by Publish Date -->
            <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <option value="">Sort by Publish Date</option>
                    <option value="asc">Oldest first</option>
                    <option value="desc">Newest first</option>
                </select>
            </div>
        </div>

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
                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>


                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>


                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>

                            <tr class="border-t border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Malcolm Lockyer</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Hello</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Tech</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">Unpublish</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <a href="{{url('/create')}}" class=" border border-grey-500 py-2 px-3 ml-4 rounded leading-tight bg-sky-500/50">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
