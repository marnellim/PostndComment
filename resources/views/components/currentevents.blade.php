@props(['selectedCategory' => ''])

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-center">
            <div class="card-deck">
                <div class="card">
                    <img src="{{ asset('images/currentevents.png') }}" class="card-img-top" alt="Current Events" />
                    <div class="card-body">
                        <h5 class="category">Current Events</h5>
                        <div class="mt-3">
                            <form method="GET" action="{{ route('comments.index') }}">
                                <input type="hidden" name="category" value="Current Events">
                                @if(\Route::currentRouteName() !== 'comments.index')
                                    <x-primary-button>{{ __('View Post/Comments') }}</x-primary-button>
                                @endif                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
