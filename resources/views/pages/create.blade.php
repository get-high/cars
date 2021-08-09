@extends('layouts.app')

@section('title', 'Добавить новость')

@section('head')
    <link href="{{asset('assets/css/inner_page_template_styles.css')}}" rel="stylesheet">
@endsection

@section('body')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">Добавить новость</h1>
            <x-panels.errors />
            <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <x-input.group name="title" label="Название новости">
                            <input id="title" name="title" value="{{ old('title') }}" type="text" class="mt-1 block w-full rounded-md @error('title') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Заголовок">
                        </x-input.group>
                        <x-input.group name="description" label="Краткое описание новости">
                            <input id="description" name="description" value="{{ old('description') }}" type="text" class="mt-1 block w-full rounded-md @error('description') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Описание">
                        </x-input.group>
                        <x-input.group name="body" label="Детальное описание">
                            <textarea id="body" name="body" class="mt-1 block w-full rounded-md @error('body') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{ old('body') }}</textarea>
                        </x-input.group>
                        <x-input.group name="tags" label="Теги">
                            <input id="tags" name="tags" value="{{ old('tags') }}" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Теги (через запятую)">
                        </x-input.group>
                        <x-input.group name="image" label="Изображение">
                            <input id="image" name="image" type="file" class="mt-1 block w-full focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </x-input.group>
                        <x-input.checkbox label="Опубликован">
                            <input type="hidden" name="published_at" value="0" />
                            <input type="checkbox" name="published_at" value="{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" @if(old('published_at')) checked @endif />
                        </x-input.checkbox>
                        <x-input.buttons />
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection