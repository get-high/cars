@props(['name', 'label'])

<div class="block">
    <label for="{{$name}}" class="text-gray-700 font-bold">{{$label}}</label>
    {{ $slot }}
    @error($name)<span class="text-xs italic text-red-600">Введены некорректные данные</span>@enderror
</div>