@push('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer le profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                        <div class="card p-4">
                            <div class=" image d-flex flex-column justify-content-center align-items-center">
                                <button class="btn btn-secondary" id="btn">
                                    <img src="img/user.png" height="250" width="250" />
                                </button>
                                <form method="POST" action="{{route('submit-edit-profile')}}" enctype="multipart/form-data">
                                    @csrf
                                    <x-label for="pseudo" :value="__('Pseudo')" />
                                    <x-input id="pseudo" type="text" name="pseudo" required class="name mt-3" value="{{Auth::user()->name}}" />

                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" type="text" name="email" required class="name mt-3" value="{{Auth::user()->email}}" />

                                    <div class="text mt-3">
                                        <x-label for="bio" :value="__('Biographie')" />
                                        <textarea id="bio" name="bio" value="{{Auth::user()->bio}}"></textarea>
                                    </div>

                                    <x-button type="submit" class="py-2"> Modifier le profil </x-button>

                                    <div class=" px-2 rounded mt-4 date ">
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
