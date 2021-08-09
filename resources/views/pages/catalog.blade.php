@extends('layouts.app')

@section('title', isset($category->name) ? $category->name : 'Каталог' )

@section('head')
    <link href="{{asset('assets/css/inner_page_template_styles.css')}}" rel="stylesheet">
@endsection

@section('body')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ isset($category->name) ? $category->name : 'Каталог' }}</h1>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach($cars as $key => $car)
                    <x-panels.car :car="$car" />
                @endforeach
            </div>
            <div class="text-center mt-4">
                {{$cars->links()}}
            </div>
        </div>
    </main>
@endsection