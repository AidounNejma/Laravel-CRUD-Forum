@push('styles')
    <link href="{{ asset('css/show_all_posts.css') }}" rel="stylesheet">
@endpush
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tous les posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <article class="postcard dark blue">
                                <a class="postcard__img_link" href="{{ route('show.one.post', ['id' => $post->id]) }}">
                                    <img class="postcard__img" src="{{asset('/pictures/'. $post->picture)}}" alt="Image du film {{$post->title}} " />
                                </a>
                                <div class="postcard__text">
                                    <h1 class="postcard__title blue"><a href="{{ route('show.one.post', ['id' => $post->id]) }}">{{$post->title}}</a></h1>
                                    <div class="postcard__subtitle small">
                                        <time datetime="{{$post->created_at}}">
                                            <i class="fas fa-calendar-alt mr-2"></i>{{$post->created_at->format('j-m-Y')}}
                                        </time>
                                    </div>
                                    <div class="postcard__bar"></div>
                                    <div class="postcard__preview-txt">{{$post->summary}}</div>
                                    <ul class="postcard__tagbox">
                                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>{{$post->type}}</li>
                                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>{{$post->duration}} minutes</li>
                                        <li class="tag__item play blue">
                                            <a href="{{ route('show.one.post', ['id' => $post->id]) }}"><i class="fas fa-play mr-2"></i>Voir les discussions</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                    @else
                    <h1>Aucun post trouvé</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
