@push('styles')
    <link href="{{ asset('css/show_one_post.css') }}" rel="stylesheet">
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('show-posts')}}" class="linkReturn"><i class="fas fa-chevron-left"></i></a>
            {{ __('Forum ' . $post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b">
                    @if (Gate::allows('access-admin'))
                    <div class="py-2 d-flex flex-row-reverse">
                            <a href="{{route('edit-one-post', $post->id)}}" class="linkEdit"><i class="far fa-edit"></i> Editer</a>
                    </div>
                    @endif

                    <article class="postcard dark red">
                        <div class="postcard__text">
                            <div class="postcard__subtitle small">
                                <time datetime="{{$post->created_at}}">
                                    <i class="fas fa-calendar-alt mr-2"></i>Publié le : {{$post->created_at->format('d-m-Y à H:i:s')}}
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                        </div>
                        <h1 class="text-center font-weight-bold text-xl text-white leading-tigh py-4" id="title">{{$post->title}}</h1>
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="{{asset('/pictures/'. $post->picture)}}" alt="Image du film {{$post->title}} " />
                        </a>
                        <div class="postcard__text">
                            <div class="postcard__preview-txt">{{$post->summary}}</div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{$post->type}}</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>{{$post->duration}} minutes</li>
                                <li class="tag__item"><i class="fas fa-clock mr-2"></i>Date de sortie : {{$post->released_at}}</li>
                            </ul>
                        </div>
                    </article>

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
                            <x-button type="submit"> Envoyer le message </x-button>
                        </div>
                    </form>

                    @foreach ($comments as $comment)
                        <div class="comment postcard dark red">
                            <div class="comment-header">
                                <h4 class="text-white">{{$pseudo[$comment->user_id]}}</h4>
                                <p class="text-white">{{$comment->created_at->format('d-m-Y à H:i')}}</p>
                            </div>

                            <p class="text-white">{{$comment->content}}</p>
                            @if(Gate::allows('access-admin'))
                            <div class="comment-actions">
                                <a href="{{route('destroy.comment', $comment->id)}}" class="delete"><i class='fas fa-trash-alt'></i></a>
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
