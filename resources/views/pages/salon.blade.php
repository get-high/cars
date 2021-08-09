@extends('layouts.inner')

@php($title = 'Салоны')

@section('content')
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <x-panels.aside />
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">Салоны</h1>

            <div class="space-y-4 max-w-4xl">
                @foreach($allSalons as $salon)
                    @if($loop->index % 2 == 0)
                        <div class="w-full flex p-4">
                            <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                                <img src="{{$salon->image}}" class="w-full h-full object-cover" alt="">
                            </div>
                            <div class="px-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-black font-bold text-xl mb-2">{{$salon->name}}</div>
                                    <div class="text-base space-y-2">
                                        <p class="text-gray-400">{{$salon->address}}</p>
                                        <p class="text-black">{{$salon->phone}}</p>
                                        <p class="text-sm">Часы работы:<br> {{$salon->work_hours}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="w-full flex justify-end bg-gray-100 p-4">
                            <div class="px-4 flex flex-col justify-between leading-normal text-right">
                                <div class="mb-8">
                                    <div class="text-black font-bold text-xl mb-2">{{$salon->name}}</div>
                                    <div class="text-base space-y-2">
                                        <p class="text-gray-400">{{$salon->address}}</p>
                                        <p class="text-black">{{$salon->phone}}</p>
                                        <p class="text-sm">Часы работы:<br> {{$salon->work_hours}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                                <img src="{{$salon->image}}" class="w-full h-full object-cover" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach
                <hr class="text-orange">

                <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>

                <div class="bg-gray-200">
                    Карта с салонами
                </div>
            </div>
        </div>
    </div>
@endsection