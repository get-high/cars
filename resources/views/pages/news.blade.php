@extends('layouts.inner')

@section('title', 'Все новости')

@section('content')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <x-panels.aside />
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            @admin<a href="{{route('articles.create')}}">Добавить новость</a>@endadmin
            <h1 class="text-black text-3xl font-bold mb-4">Новости</h1>
            <div class="space-y-4">
                @foreach($articles as $key => $article)
                    <div class="w-full flex">
                        <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                            @isset($article->image->name)<a class="block w-full h-full hover:opacity-75" href="{{route('articles.show', $article)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($article->image->name)}}" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>@endisset
                        </div>
                        <div class="px-4 leading-normal">
                            <div class="mb-8 space-y-2">
                                <div class="text-black font-bold text-xl">
                                    <a class="hover:text-orange" href="{{route('articles.show', $article)}}">{{$article->title}}</a>
                                </div>
                                <p class="text-gray-600 text-base">
                                    <a class="hover:text-orange" href="{{route('articles.show', $article)}}">{{$article->description}}</a>
                                </p>
                                <x-panels.tags :tags="$article->tags" />
                                <div class="flex items-center">
                                    <p class="text-sm text-gray-400 italic">{{$article->published_at}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
