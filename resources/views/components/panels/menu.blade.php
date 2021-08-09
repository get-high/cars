@props(['categories', 'current'])

<nav class="order-1">
    <ul class="block lg:flex">
    @foreach($categories as $category)
        @if($category->isRoot())
            <li class="group">
                @if($category->descendants->count() > 0)
                    <a class="inline-block p-4 {{ ($category->id == $current or $category->descendants->pluck('id')->contains($current)) ? 'text-orange' : 'text-black' }} font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{route('category', $category)}}">
                        {{$category->name}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                        @foreach($category->children as $cat)
                            <li><a class="block py-2 px-4 {{ ($cat->id == $current) ? 'text-orange' : 'text-black' }} hover:text-orange hover:bg-gray-100" href="{{route('category', $cat)}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <a class="inline-block p-4 {{ ($category->id == $current) ? 'text-orange' : 'text-black' }} font-bold hover:text-orange" href="{{route('category', $category)}}">{{$category->name}}</a>
                @endif
            </li>
        @endif
    @endforeach
    </ul>
</nav>