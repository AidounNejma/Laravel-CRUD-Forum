@push('styles')
    <link href="{{ asset('css/posts_view_admin.css') }}" rel="stylesheet">
@endpush

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des posts') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b">
                    <a class="tableLinks add" class="mb-4" href="{{route('add-user')}}"> <i class="fas fa-plus-circle"></i> Ajouter un utilisateur</a>
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                    @if ($users->count() > 0)
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Pseudo</th>
                                <th scope="col">Email</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Dernière modification</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Éditer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->format('d-m-Y H:i:s')}}</td>
                                <td>{{$user->updated_at->format('d-m-Y H:i:s')}}</td>
                                <td>{{$user->admin}}</td>
                                <td><a class="tableLinks see" href=""><i class="fas fa-eye"></i></a></td>
                                <td><a href="{{ route('edit-one-user', ['id' => $user->id]) }}" class="tableLinks edit"><i class="far fa-edit"></i></a></td>
                                <td>
                                    <form action="{{route('destroy.user', $user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="tableLinks delete"><i class='fas fa-trash-alt'></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h1 class="text-center">Aucun utilisateur trouvé.</h1>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
