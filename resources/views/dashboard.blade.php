<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 text-center bg-gray-800">
                    <div class="flex justify-center items-center custom-height">
                        <div style="position: relative; width: 500px;">
                            <div style="display: flex; justify-content: left;">
                                <img src="{{ asset('images/welcome.png') }}" alt="Welcome" style="width: 100%; object-fit: contain;">
                            </div>
                            <div style="position: absolute; top: 75%; left: 25%; transform: translate(-50%, -50%);">
                                @auth
                                    <h1 class="text-5xl">
                                        <span class="text-gray-900 text-white">{{ ucwords(auth()->user()->name) }}</span>
                                    </h1>
                                @endauth                         
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-1 text-center bg-gray-800">
                    <h1 class="text-3xl text-white font-bold mt-4">Tell us what you want to do today...</h1>
                    <div class="p-6 text-center">
                    <x-create-post />
                    <span class="text-2xl mx-2 text-white">{{ __('OR') }}</span> 
                    <a href="{{ route('posts.index') }}">
                        <x-primary-button>{{ __('Leave a Comment') }}</x-primary-button>
                    </a>
                </div>
           </div>
        </div>
    </div>
    <x-card-deck />
</x-app-layout>
