<x-app-layout>
    <x-slot name="header">
        <div class="mb-2 flex item-center justify-between">
            <h2 class="felx item-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Posts') }}
            </h2>
            <div class="inline-flex gap-2">

                @can('view', $post)
                <x-button href="{{ route('posts.show', $post->id) }}" label="View" icon="fas fa-eye"
                    color="bg-green-600 hover:bg-green-800" />
                @endcan
                @can('delete', $post)
                <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">{{
                    __('Delete')
                    }}</x-danger-button>
                @endcan

                <x-button href="{{ route('posts.index') }}" label="Back" icon="fas fa-arrow-left"
                    color="bg-gray-500 hover:bg-gray-700" />

            </div>

        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('posts.update',$post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- TITLE --}}
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required
                            placeholder="Enter Post Title" value="{{ old('title',$post->title) }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Content --}}
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <textarea id="content" name="content" rows="6"
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required value="{{ old('content',$post->content) }}"
                            placeholder="Enter Post content">{{ old('content',$post->content) }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    {{-- Bution --}}

                    <x-primary-button class="mt-2">
                        {{ __('Update') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>


    <x-delete-modal :route="route('posts.destroy', $post->id)" modalName="confirm-post-deletion"
        title="Are you sure you want to delete this post?"
        description="Once this post is deleted, it cannot be recovered." buttonLabel="Delete Post" />

</x-app-layout>
