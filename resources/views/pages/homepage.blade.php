@extends('layouts.app')

@section('title', 'Главная страница')

@section('head')
    <link href="{{asset('assets/css/main_page_template_styles.css')}}" rel="stylesheet">
@endsection

@section('body')
<main class="flex-1 container mx-auto bg-white">
    @isset($banners)
        <section class="bg-white">
            <div data-slick-carousel>
                @foreach($banners as $banner)
                    <div class="relative banner">
                        <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{\Illuminate\Support\Facades\Storage::url($banner->image->name)}}" alt="" title=""></div>
                        <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                            <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">{{$banner->title}}</h1>
                            <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">{{$banner->description}} @isset($banner->url)<a href="{{$banner->url}}" class="text-orange hover:opacity-75">подробнее</a>@endisset</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endisset
    @if($newCars->count() > 0)
        <section class="pb-4 px-6">
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach($newCars as $car)
                    <x-panels.car :car="$car" />
                @endforeach
            </div>
        </section>
    @endif
    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{route('articles.index')}}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach($articles as $key => $article)
            <div class="w-full flex">
                <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                    @isset($article->image->name)<a class="block w-full h-full hover:opacity-75" href="{{route('articles.show', $article)}}"><img src="{{\Illuminate\Support\Facades\Storage::url($article->image->name)}}" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>@endisset
                </div>
                <div class="px-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-white font-bold text-xl mb-2">
                            <a class="hover:text-orange" href="{{route('articles.show', $article)}}">{{$article->title}}</a>
                        </div>
                        <p class="text-gray-300 text-base">
                            <a class="hover:text-orange" href="{{route('articles.show', $article)}}">{{$article->description}}</a>
                        </p>
                    </div>
                    <x-panels.tags :tags="$article->tags" />
                    <div class="flex items-center">
                        <p class="text-sm text-gray-400 italic">{{$article->published_at}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>
@endsection
