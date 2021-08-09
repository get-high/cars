@component('mail::message')
# Добавлена новость: {{$article->title}}

{{$article->title}}

{{$article->body}}

@component('mail::button', ['url' => route('articles.show', $article)])
Посмотреть новость
@endcomponent

{{ config('app.name') }}
@endcomponent
