{{-- Global Flash Messages Component --}}
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition
            class="mb-6 px-6 py-4 rounded-lg bg-green-100 border border-green-300 text-green-900 shadow-md relative">
            <span class="block text-lg font-semibold">{{ session('success') }}</span>
            <button type="button" class="absolute top-3 right-3 text-green-700 hover:text-green-900 text-xl font-bold"
                x-on:click="show = false">
                &times;
            </button>
        </div>
        @endif

        @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-transition
            class="mb-6 px-6 py-4 rounded-lg bg-red-100 border border-red-300 text-red-900 shadow-md relative">
            <span class="block text-lg font-semibold">{{ session('error') }}</span>
            <button type="button" class="absolute top-3 right-3 text-red-700 hover:text-red-900 text-xl font-bold"
                x-on:click="show = false">
                &times;
            </button>
        </div>
        @endif

        @if (session('warning'))
        <div x-data="{ show: true }" x-show="show" x-transition
            class="mb-6 px-6 py-4 rounded-lg bg-yellow-100 border border-yellow-300 text-yellow-900 shadow-md relative">
            <span class="block text-lg font-semibold">{{ session('warning') }}</span>
            <button type="button" class="absolute top-3 right-3 text-yellow-700 hover:text-yellow-900 text-xl font-bold"
                x-on:click="show = false">
                &times;
            </button>
        </div>
        @endif
    </div>
</div>
