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
                    @if (Gate::allows('access-admin'))
                        <a href="{{route('modify.one.post', $post->id)}}" class="linkEdit"><i class="far fa-edit"></i> Editer</a>
                    @endif
                    <h1 class="text-center font-weight-bold text-xl text-white leading-tigh py-4">{{$post->title}}</h1>
                    <img src="{{$post->picture}}" alt="" class="mx-auto py-4">
                    <p class="text-center text-white mx-auto py-4">{{$post->summary}}</p>
                    <p class="text-center text-white mx-auto py-4 font-semibold">Date de sortie : {{$post->released_at}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
