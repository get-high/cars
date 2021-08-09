<footer class="container mx-auto">
    <section class="block sm:flex bg-white px-4 sm:px-8 py-4">
        <div class="flex-1">
            <div>
                <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
                <span class="inline-block pl-1"> / <a href="{{route('salons')}}" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
            </div>

            <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
                @foreach($salons as $salon)
                    <div class="w-full flex">
                    <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
                        <a class="block w-full h-full hover:opacity-75" href="{{route('salons')}}"><img src="{{asset($salon->image)}}" class="w-full h-full object-cover" alt=""></a>
                    </div>
                    <div class="px-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <div class="text-black font-bold text-xl mb-2">
                                <a class="hover:text-orange" href="{{route('salons')}}">{{$salon->name}}</a>
                            </div>
                            <div class="text-base space-y-2">
                                <p class="text-gray-400">{{$salon->address}}</p>
                                <p class="text-black">{{$salon->phone}}</p>
                                <p class="text-sm">Часы работы:<br> {{$salon->work_hours}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
            <p class="text-3xl text-black font-bold mb-4">Информация</p>
            <nav>
                <ul class="list-inside  bullet-list-item">
                    <li><a class="{{ (request()->is('about')) ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('page','about')}}">О компании</a></li>
                    <li><a class="{{ (request()->is('contact')) ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}"      href="{{route('page', 'contact')}}">Контактная информация</a></li>
                    <li><a class="{{ (request()->is('terms')) ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('page', 'terms')}}">Условия продаж</a></li>
                    <li><a class="{{ (request()->is('findep')) ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('page', 'findep')}}">Финансовый отдел</a></li>
                    <li><a class="{{ (request()->is('client')) ? 'text-orange cursor-default' : 'text-gray-600 hover:text-orange' }}" href="{{route('page', 'client')}}">Для клиентов</a></li>
                </ul>
            </nav>
        </div>
    </section>


    <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
        <div class="copy pr-8">© 2021 Продажа автомобилей</div>
    </div>
</footer>