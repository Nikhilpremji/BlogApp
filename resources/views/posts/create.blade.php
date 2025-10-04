<x-app-layout>
    <x-slot name="header">
        <div class="mb-2 flex item-center justify-between">
            <h2 class="felx item-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Posts') }}
            </h2>

            <x-button href="{{ route('posts.index') }}" label="Back" icon="fas fa-arrow-left"
                color="bg-gray-500 hover:bg-gray-700" />
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    {{-- TITLE --}}
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full " type="text" name="title" required
                            placeholder="Enter Post Title" value="{{ old('title') }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    {{-- Content --}}
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <textarea id="content" name="content" rows="6"
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm "
                            required value="{{ old('content') }}"
                            placeholder="Enter Post content">{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    {{-- Bution --}}

                    <x-primary-button class="mt-2">
                        {{ __('Create') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
