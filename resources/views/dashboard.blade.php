@push('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(Gate::allows('access-admin'))
                        <h1 class="text-center" style="color:red;">Vue administrateur</h1>
                        <h4 class="text-center welcome">Bienvenue, {{Auth::user()->name}} !</h4>
                    @else
                        <h2 class="text-center welcome">Bienvenue, {{Auth::user()->name}} !</h2>
                    @endif

                    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                        <div class="card p-4">
                            <div class=" image d-flex flex-column justify-content-center align-items-center">
                                <button class="btn btn-secondary" id="btn">
                                    <img src="img/user.png" height="250" width="250" />
                                </button> <span class="name mt-3">{{Auth::user()->name}}</span>
                                <span class="idd">{{Auth::user()->email}}</span>

                                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                                    <span class="number">1069 <span class="follow">posts commentés</span></span>
                                </div>

                                <div class=" d-flex mt-2">
                                    <button class="btn1 btn-dark">Editer mon Profil</button>
                                </div>

                                <div class="text mt-3">
                                    <span>Ma petite bio, bla bla bla bla bla
                                        <br><br> Je fais aussi bla bla bla bla bla.
                                    </span>
                                </div>

                                <div class=" px-2 rounded mt-4 date ">
                                    <span class="join">Inscrit(e) depuis le : {{Auth::user()->created_at->format('d.m.Y')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
