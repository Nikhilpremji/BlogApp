<x-app-layout>
    <x-slot name="header">
        <div class="mb-2 flex item-center justify-between">
            <h2 class="felx item-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('View Posts') }}
            </h2>

            <div class="inline-flex gap-2">

                @can('update', $post)
                <x-button href="{{ route('posts.edit', $post->id) }}" label="Edit" icon="fas fa-edit"
                    color="bg-blue-600 hover:bg-blue-800" />
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

                {{-- Post Title --}}
                <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>

                {{-- Post Content --}}
                <div class="prose max-w-full text-gray-700 dark:text-gray-300">
                    {!! nl2br(e($post->content)) !!}
                </div>

                {{-- Optional Metadata --}}
                <div class="mt-6 text-sm text-gray-500">
                    <p>Author: {{ $post->user->name }}</p>
                    <p>Created at: {{ $post->created_at->format('d M Y, h:i A') }}</p>
                    @if($post->updated_at->gt($post->created_at))
                    <p>Updated at: {{ $post->updated_at->format('d M Y, h:i A') }}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>



    <x-delete-modal :route="route('posts.destroy', $post->id)" modalName="confirm-post-deletion"
        title="Are you sure you want to delete this post?"
        description="Once this post is deleted, it cannot be recovered." buttonLabel="Delete Post" />


</x-app-layout>
