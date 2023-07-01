<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    @auth
                       <h1 class="text-5xl"> {{ __("Hi") }}, <span class="text-gray-800">{{ ucwords(auth()->user()->name) }}</span></h1>
                    @endauth
                    <div class="flex justify-center items-center custom-height">
                        <img src="{{ asset('images/github.jpg') }}" alt="GitHub Logo" width="150" height="200">
                    </div>                    
                    <h1 class="text-5xl"> {{ __("What would you like to do?")}}</h1>
                    
                </div>
                <div class="p-6 text-center">
                    <x-create-post />
                    <span class="text-2xl mx-2">{{ __('OR') }}</span> 
                    <a href="{{ route('posts.index') }}">
                        <x-primary-button>{{ __('Leave a Comment') }}</x-primary-button>
                    </a>
                </div>                       
            </div>
        </div>
    </div>
</x-app-layout>
