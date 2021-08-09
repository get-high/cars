@extends('layouts.app')

@section('head')
    <link href="{{asset('assets/css/inner_page_template_styles.css')}}" rel="stylesheet">
@endsection

@section('body')
    <main class="flex-1 container mx-auto bg-white flex">
        @yield('content')
    </main>
@endsection
