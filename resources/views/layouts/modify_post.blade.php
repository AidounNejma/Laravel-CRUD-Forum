<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

        <form method="POST" action="{{route('submit.edit', $post->id)}}" enctype="multipart/form-data">
            @csrf

            <!-- Post Title -->
            <div>
                <x-label for="title" :value="__('Titre')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$post->title}}" required autofocus />
            </div>

            <!-- Post Summary  -->
            <div class="mt-4">
                {{csrf_field()}}
                <x-label for="summary" :value="__('Résumé')" />

                <x-input id="summary" class="block mt-1 w-full" type="text" name="summary" value="{{$post->summary}}" required />
            </div>

            <!-- Post relased at -->
            <div class="mt-4">
                <x-label for="released_at" :value="__('Date de sortie')" />

                <x-input id="released_at" class="block mt-1 w-full" type="date" name="released_at" value="{{$post->released_at}}" required  />
            </div>

            <!-- Post picture -->
            <div class="mt-4">
                <x-label for="picture" :value="__('Image')" />

                <x-input id="picture" class="block mt-1 w-full" type="text" name="picture" value="{{$post->picture}}" required  />
            </div>

                <x-button type="submit" class="ml-4"> Modifier un post </x-button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
