<x-app-layout>

    @if ($selectedCategory === 'Current Events')
        <x-currentevents :selectedCategory="$selectedCategory ?? ''" />
    @elseif ($selectedCategory === 'How To Guides')
        <x-howtoguides :selectedCategory="$selectedCategory ?? ''" />
    @elseif ($selectedCategory === 'Product Reviews')
        <x-productreviews :selectedCategory="$selectedCategory ?? ''" />
    @endif

</x-app-layout>