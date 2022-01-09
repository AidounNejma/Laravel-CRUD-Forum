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
                    <h1>Vue administrateur</h1>
                    {{-- <p>{{$user->name}}</p> --}}
                    @else
                    <h1>Vue utilisateur</h1>
                    @endif
                    <h2 class="welcomeDashboard">Ravi de te revoir, {{Auth::user()->name}} !</h2>
                    <p>Inscrit depuis le : {{Auth::user()->created_at->format('j F, Y')}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
