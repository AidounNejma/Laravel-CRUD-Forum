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
                    <a class="tableLinks add" class="mb-4" href="{{route('add-post')}}"> <i class="fas fa-plus-circle"></i> Ajouter un post</a>
                @if ($posts->count() > 0)
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Date de création</th>
                                <th scope="col">Image</th>
                                <th scope="col">Type</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Éditer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td><img src="{{asset('/pictures/'. $post->picture)}}" alt="" width="50px"></td>
                                <td>{{$post->type}}</td>
                                <td><a class="tableLinks see" href="{{ route('show.one.post', ['id' => $post->id]) }}"><i class="fas fa-eye"></i></a></td>
                                <td><a href="{{route('edit-one-post', $post->id)}}" class="tableLinks edit"><i class="far fa-edit"></i></a></td>
                                <td><a href="" class="tableLinks delete"><i class="fas fa-trash-alt"></i></a></td>
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
