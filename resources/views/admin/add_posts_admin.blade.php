<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Ajouter un post') }}
        </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if(session('status'))
                <h6 class="alert alert-success">{{session('status')}}</h6>
            @endif
            <form method="POST" action="{{route('submit.post')}}" enctype="multipart/form-data">
                @csrf

                <!-- Post Title -->
                <div>
                    <x-label class="text-white" for="title" :value="__('Titre')" />

                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                </div>

                <!-- Post Summary  -->
                <div class="mt-4">
                    {{csrf_field()}}
                    <x-label class="text-white" for="summary" :value="__('Résumé')" />

                    <x-input id="summary" class="block mt-1 w-full" type="text" name="summary" :value="old('summary')" required />
                </div>

                <!-- Post relased at -->
                <div class="mt-4">
                    <x-label class="text-white" for="released_at" :value="__('Date de sortie')" />

                    <x-input id="released_at" class="block mt-1 w-full" type="date" name="released_at" required  />
                </div>

                <!-- Post duration -->
                <div class="mt-4">
                    <x-label class="text-white" for="duration" :value="__('Durée')" />

                    <x-input id="duration" class="block mt-1 w-full" type="number" name="duration" required  />
                </div>

                <!-- Post relased at -->
                <div class="mt-4">
                    <x-label class="text-white" for="type" :value="__('Type')" />

                    <select class="block mt-1 w-full" name="type" id="type" required>
                        <option value="actu_cinéma">Actualités cinéma</option>
                        <option value="serie_tv">Séries TV</option>
                        <option value="animation">Animation</option>
                    </select>
                </div>

                <!-- Post picture -->
                <div class="mt-4">
                    <x-label class="text-white" for="picture" :value="__('Image')" />

                    <x-input id="picture" class="block mt-1 w-full bg-white" type="file" name="picture" required  />
                </div>

                    <x-button type="submit" class="py-4"> Ajouter un post </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
    </x-app-layout>
