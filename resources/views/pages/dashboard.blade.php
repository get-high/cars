@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('head')
    <link href="{{asset('assets/css/inner_page_template_styles.css')}}" rel="stylesheet">
@endsection
@section('body')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">{{ Auth::user()->name }}, Вы вошли!</h1>
        </div>
    </main>
@endsection