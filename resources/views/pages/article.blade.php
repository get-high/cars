@extends('layouts.inner')

@section('title', 'Новость: ' . $article->title)

@section('content')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <x-panels.aside />
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            @admin<a href="{{route('articles.edit', $article)}}">Редактировать новость</a>@endadmin
            <h1 class="text-black text-3xl font-bold mb-4">{{$article->title}}</h1>
            <div class="space-y-4">
                @isset($article->image->name)<img src="{{\Illuminate\Support\Facades\Storage::url($article->image->name)}}" alt="" title="">@endisset
                <x-panels.tags :tags="$article->tags" />
                <p>{{$article->body}}</p>
            </div>
            <div class="mt-4">
                <a class="inline-flex items-center text-orange hover:opacity-75" href="{{route('articles.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    К списку новостей
                </a>
            </div>
        </div>
    </div>
@endsection
