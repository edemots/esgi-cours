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
                    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">Welcome on the Wall!</h1>
                    <form action="{{ route('post-message') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="flex">
                            <input type="text" name="message" class="min-w-0 flex-1 mr-4 border-gray-500 rounded focus:outline-none focus:ring-4 focus:ring-indigo-300/50" placeholder="How much is Twitter?">
                            <button class="bg-indigo-200 hover:bg-indigo-300 text-indigo-900 px-4 py-2 rounded">Post on the wall</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section class="p-6 space-x-2">
                    @foreach($messages as $message)
                        <a href="{{ route('messages.show', ['message' => $message->id]) }}" class="group">
                            <article class="flex group-hover:bg-gray-100 px-4 py-2 rounded">
                                <p class="flex-1 mr-6 group-hover:text-blue-500">
                                    {{ $message->body }}
                                    @if ($message->updated_at > $message->created_at)
                                        <span class="italic text-gray-400">Modifié</span>
                                    @endif
                                </p>
                                <time class="text-gray-700">{{ $message->created_at->diffForHumans() }}</time>
                            </article>
                        </a>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
