{{-- resources/views/components/delete-modal.blade.php --}}
<x-modal name="{{ $modalName ?? 'confirm-deletion' }}" focusable>
    <form method="post" action="{{ $route }}" class="p-6">
        @csrf
        @method('delete')

        {{-- Modal Title --}}
        <h2 class="text-lg font-medium text-gray-900">
            {{ $title ?? __('Are you sure you want to delete this item?') }}
        </h2>

        {{-- Modal Description --}}
        <p class="mt-1 text-sm text-gray-600">
            {{ $description ?? __('This action is permanent and cannot be undone.') }}
        </p>

        {{-- Modal Buttons --}}
        <div class="mt-6 flex justify-end gap-2">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button type="submit">
                {{ $buttonLabel ?? __('Delete') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
