<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    <li><a class="{{ (request()->is('about')) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('page', 'about')}}">О компании</a></li>
                    <li><a class="{{ (request()->is('contact')) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('page', 'contact')}}">Контактная информация</a></li>
                    <li><a class="{{ (request()->is('terms')) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('page', 'terms')}}">Условия продаж</a></li>
                    <li><a class="{{ (request()->is('findep')) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('page', 'findep')}}">Финансовый отдел</a></li>
                    <li><a class="{{ (request()->is('client')) ? 'text-orange cursor-default' : 'hover:text-orange' }}" href="{{route('page', 'client')}}">Для клиентов</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>