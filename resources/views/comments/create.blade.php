<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-5 lg:px-8 flex justify-between">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="grid" style="--bs-columns: 10; --bs-gap:1rem;">
                    <div class="g-col-4 frame">
                        @if ($post->category === 'Current Events')
                            <x-currentevents />
                        @elseif ($post->category === 'Product Reviews')
                            <x-productreviews />
                        @elseif ($post->category === "How To Guides")
                            <x-howtoguides />
                        @endif
                    </div>
                    <div class="g-col-6 frame">
                        <x-post-comment-userid :post="$post" />
                        <x-new-comment :post="$post" :user-id="$user_id ?? null" />
                    </div>
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>

