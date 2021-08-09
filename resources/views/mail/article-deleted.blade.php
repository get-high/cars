@component('mail::message')
# Новость удалена: {{$article->title}}

{{$article->title}}

{{$article->body}}

{{ config('app.name') }}
@endcomponent
