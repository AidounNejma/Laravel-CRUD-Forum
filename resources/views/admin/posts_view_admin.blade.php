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
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                    @if ($posts->count() > 0)
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Identifiant</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Image</th>
                                <th scope="col">Type</th>
                                <th scope="col">Créé le</th>
                                <th scope="col">Dernière modification</th>
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
                                <td><img src="{{asset('/pictures/'. $post->picture)}}" alt="" width="50px"></td>
                                <td>{{$post->type}}</td>
                                <td>{{$post->created_at->format('d-m-Y H:i:s')}}</td>
                                <td>{{$post->updated_at->format('d-m-Y H:i:s')}}</td>
                                <td><a class="tableLinks see" href="{{ route('show.one.post', ['id' => $post->id]) }}"><i class="fas fa-eye"></i></a></td>
                                <td><a href="{{route('edit-one-post', $post->id)}}" class="tableLinks edit"><i class="far fa-edit"></i></a></td>

                                <td>
                                    <form action="{{route('destroy.post', $post->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="tableLinks delete"><i class='fas fa-trash-alt'></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <br><br><br><br><br><br><br>
                        <h1 class="text-center text-white">Aucun post trouvé.</h1>
                        <br><br><br><br><br><br><br>
                @endif
            </div>
        </div>
    </div>
</div>
</x-app-layout>
