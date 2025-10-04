@props([
'href' => null, // URL, defaults to previous page
'label' => 'Back', // Button text
'icon' => 'fas fa-arrow-left', // Font Awesome icon class
'color' => 'bg-gray-600', // Button background color
])

<a href="{{ $href ?? url()->previous() }}"
    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white rounded-lg shadow {{ $color }} hover:bg-blue-900">
    <i class="{{ $icon }}"></i>
    {{ $label }}
</a>
