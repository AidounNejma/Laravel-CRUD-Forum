<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editer un utlisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                <form method="POST" action="{{route('submit.edit.user', $user->id)}}" enctype="multipart/form-data">
                    @csrf

                    <!-- User Name -->
                    <div>
                        <x-label class="text-white" for="name" :value="__('Nom')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
                    </div>

                    <!-- User Email  -->
                    <div class="mt-4">
                        {{csrf_field()}}
                        <x-label class="text-white" for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$user->email}}" required />
                    </div>

                    <!-- User Password  -->
                    <div class="mt-4">
                        {{csrf_field()}}
                        <x-label class="text-white" for="password" :value="__('Mot de passe')" />

                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" value="{{$user->password}}" required />
                    </div>

                    <!-- User Status -->
                    <div class="mt-4">
                        <x-label class="text-white" for="admin" value="{{$user->admin}}" />

                        <select class="block mt-1 w-full" name="admin" id="admin" required>
                            @if($user->admin== 0)
                            <option value="0" selected>Utilisateur</option>
                            <option value="1">Admin</option>
                            @else
                            <option value="0">Utilisateur</option>
                            <option value="1" selected>Admin</option>
                            @endif
                        </select>
                    </div>

                        <x-button type="submit" class="ml-4"> Editer un utilisateur </x-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
