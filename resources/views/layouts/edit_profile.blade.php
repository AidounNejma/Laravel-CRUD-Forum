@push('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('dashboard')}}" class="linkReturn"><i class="fas fa-chevron-left"></i></a>
            {{ __('Editer le profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                        <div class="card p-4">
                            <div class=" image d-flex flex-column justify-content-center align-items-center">
                                <button class="btn btn-secondary" id="btn">
                                    <img src="img/user.png" height="250" width="250" />
                                </button>
                                <form method="POST" action="{{route('submit-edit-profile')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="text mt-3">
                                        <x-label for="name" :value="__('Pseudo')" />
                                        <x-input id="name" type="text" name="name" class="name mt-3" value="{{Auth::user()->name}}" />
                                    </div>
                                    <div class="text mt-3">
                                        <x-label for="email" :value="__('Email')" />
                                        <x-input id="email" type="text" name="email" class="name mt-3" value="{{Auth::user()->email}}" />
                                    </div>
                                    <div class="text mt-3">
                                        <x-label for="password" :value="__('Mot de passe')" />
                                        <x-input id="password" type="password" name="password" class="name mt-3" value="{{Auth::user()->password}}" />
                                    </div>

                                    <div class="text mt-3">
                                        <x-label for="bio" :value="__('Biographie')" />
                                        <textarea class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 name mt-3" id="bio" name="bio" value="{{Auth::user()->bio}}">{{Auth::user()->bio}}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <x-button type="submit" class="py-2"> Modifier le profil </x-button>
                                    </div>
                                    <div class=" px-2 rounded mt-4 date text-center">
                                        <span class="join">Inscrit(e) depuis le : {{Auth::user()->created_at->format('d.m.Y')}}</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
