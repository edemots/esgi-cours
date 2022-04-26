<x-app-layout>
    <x-slot name="header"></x-slot>

    
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
          <a href="{{ route('dashboard') }}">⬅️ Retour au wall</a>

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200 flex">
                  <form action="{{ route('messages.update', ['message' => $message]) }}" method="POST" class="flex-1">
                    @method('PATCH')
                    @csrf

                    <label class="block mb-4">
                      <span class="block">Modifier le message</span>
                      <input type="text" name="body" value="{{ $message->body }}">
                    </label>

                    <button class="bg-indigo-200 hover:bg-indigo-300 text-indigo-900 px-4 py-2 rounded">Enregistrer</button>
                  </form>
                  <form action="{{ route('messages.delete', ['message' => $message]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="bg-red-200 hover:bg-red-300 text-red-900 px-4 py-2 rounded">Supprimer</button>
                  </form>
              </div>
          </div>
    </div>
</x-app-layout>
