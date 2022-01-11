<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('all-posts')}}" class="linkReturn"><i class="fas fa-chevron-left"></i></a>
            {{ __('Modifier un article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
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

                        <x-input id="picture" class="block mt-1 w-full" type="file" name="picture" value="{{$post->picture}}" />
                    </div>

                    <!-- Post duration -->
                    <div class="mt-4">
                        <x-label for="duration" :value="__('Durée en minutes')" />

                        <x-input id="duration" class="block mt-1 w-full" type="number" value="{{$post->duration}}" name="duration" required  />
                    </div>

                    <!-- Post type -->
                    <div class="mt-4">
                        <x-label for="type" :value="__('Type')" />

                        <select class="block mt-1 w-full" name="type" id="type" required>
                            <option value="actu_cinéma" {{ $post->type == 'actu_cinéma' ? 'selected' : '' }}>Actualités cinéma</option>
                            <option value="series_tv" {{ $post->type == 'series_tv' ? 'selected' : '' }}>Séries TV</option>
                            <option value="animation" {{ $post->type == 'animation' ? 'selected' : '' }}>Animation</option>
                        </select>
                    </div>

                        <x-button type="submit" class="ml-4"> Modifier un post </x-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
