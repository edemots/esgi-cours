<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome on the Wall!
                </div>
                <form action="{{ route('post-message') }}">
                    @csrf
                    <input type="text" name="message">
                    <button>Post on the wall</button>
                </form>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-6">
                    @foreach($messages as $message)
                        <article class="flex">
                            <p class="flex-1 mr-6">{{ $message->body }}</p>
                            <time>{{ $message->created_at->diffForHumans() }}</time>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
