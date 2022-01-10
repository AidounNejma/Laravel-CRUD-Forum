<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un utilisateur') }}
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
                <form method="POST" action="{{route('submit.user')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- User Name -->
                    <div>
                        <x-label class="text-white" for="name" :value="__('Nom')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- User Email  -->
                    <div class="mt-4">
                        {{csrf_field()}}
                        <x-label class="text-white" for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required />
                    </div>

                    <!-- User Email  -->
                    <div class="mt-4">
                        {{csrf_field()}}
                        <x-label class="text-white" for="password" :value="__('Mot de passe')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" required />
                    </div>

                    <!-- User Status -->
                    <div class="mt-4">
                        <x-label class="text-white" for="admin" :value="__('Statut')" />

                        <select class="block mt-1 w-full" name="type" id="type" required>
                            <option value="0">Utilisateur</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                        <x-button type="submit" class="py-4"> Ajouter un utilisateur </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
