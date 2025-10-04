<x-app-layout>
    <x-slot name="header">
        <div class="mb-2 flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Posts') }}
            </h2>
            <x-button href="{{ route('posts.create') }}" label="Create" icon="fas fa-plus"
                color="bg-blue-600 hover:bg-blue-800" />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">

                {{-- 🔍 Search Bar --}}
                <div class="mb-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Posts List') }}
                    </h2>

                    <form method="GET" action="" class="flex gap-2 w-full sm:w-auto">
                        <div class="flex-1">
                            <x-text-input id="search" name="search" type="text" placeholder="Search..."
                                class="w-full px-4 py-2 text-sm" value="{{ request('search') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('search')" />
                        </div>

                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-500 hover:bg-blue-700">
                            Search
                        </button>

                        <a href="{{ route('posts.index') }}"
                            class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-gray-500 hover:bg-gray-700 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </a>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-200 sticky top-0 z-10">
                            <tr class="text-left text-gray-700 text-sm font-semibold">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Content</th>
                                <th class="px-4 py-3">Created At</th>
                                <th class="px-4 py-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @forelse ($posts as $data)
                            <tr class="transition duration-100 hover:bg-gray-100">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $posts->firstItem() + $loop->index }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $data->title ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ Str::limit($data->content, 50, '...') }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $data->created_at->format('d M Y') ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-right space-x-2">
                                    <a href="{{ route('posts.show', $data) }}"
                                        class="px-3 py-1 text-xs rounded-full text-white bg-blue-600 hover:bg-blue-800">
                                        View
                                    </a>
                                    @can('update',$data)
                                    <a href="{{ route('posts.edit', $data) }}"
                                        class="px-3 py-1 text-xs rounded-full text-white bg-green-600 hover:bg-green-800">
                                        Edit
                                    </a>
                                    @endcan
                                    @can('update',$data)
                                    <form action="{{ route('posts.destroy', $data) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-xs rounded-full text-white bg-red-600 hover:bg-red-800">
                                            Delete
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 text-lg font-semibold">
                                    No Posts Found
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- 📄 Pagination --}}
                <div class="mt-4 p-4 border-t border-gray-200">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
