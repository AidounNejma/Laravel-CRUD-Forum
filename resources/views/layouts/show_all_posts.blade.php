<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <h1>{{$post->title}}</h1>
                            <img src="{{$post->picture}}" alt="">
                            <p>{{$post->summary}}</p>
                            <p>{{$post->released_at}}</p>
                            <a href="{{ route('show.one.post', ['id' => $post->id]) }}">Voir le post</a>
                        @endforeach
                    @else
                    <h1>Aucun post trouvé</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
