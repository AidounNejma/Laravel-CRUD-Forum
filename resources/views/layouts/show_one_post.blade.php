@push('styles')
    <link href="{{ asset('css/show_one_post.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('show-posts')}}" class="linkReturn"><i class="fas fa-chevron-left"></i></a>
            {{ __('Forum ' . $post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b">
                    <div class="d-flex justify-content-between">
                        <p class="createdAt">Publié le {{$post->created_at->format('d-m-Y à H:i:s')}}</p>
                        @if (Gate::allows('access-admin'))
                            <a href="{{route('edit-one-post', $post->id)}}" class="linkEdit"><i class="far fa-edit"></i> Editer</a>
                        @endif
                    </div>
                    <h1 class="text-center font-weight-bold text-xl text-white leading-tigh py-4" id="title">{{$post->title}}</h1>
                    <img src="{{asset('/pictures/'. $post->picture)}}" alt="" class="mx-auto py-4" width="500px">
                    <p class="text-center text-white mx-auto py-4" >{{$post->summary}}</p>
                    <p class="text-center text-white mx-auto py-4 font-semibold">Date de sortie : {{$post->released_at}}</p>
                </div>
                <div class="p-6 border-b">
                    <h1 class="text-white text-center">Forum</h1>
                    @if(session('status'))
                        <h6 class="alert alert-success">{{session('status')}}</h6>
                    @endif
                    <form action="{{route('add-comment', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label class="text-white" for="content" :value="__('Commentaire')" />
                            <textarea id="content" class="block mt-1 w-full" type="text" name="content" value="" required autofocus /></textarea>
                            <x-button type="submit" class="ml-4"> Envoyer le message </x-button>
                        </div>
                    </form>

                    @foreach ($comments as $comment)
                        <h4 class="text-white">{{$pseudo[$comment->user_id]}}</h4>
                        <p class="text-white">{{$comment->content}}</p>
                        <p class="text-white">{{$comment->created_at->format('d-m-Y à h:i')}}</p>
                        <form action="{{route('destroy.comment', $comment->id)}}" method="post">
                            @csrf
                            <button type="submit" class="tableLinks delete"><i class='fas fa-trash-alt'></i></button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
