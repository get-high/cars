<x-guest-layout>
    <x-auth-card>
        <h1 class="text-black text-3xl font-bold mb-4">Проверка email</h1>
        <x-panels.errors />
        @if (session('status') == 'verification-link-sent')
            <div class="my-4">
                <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                    <p>На указанный вами во время регистрации адрес электронной почты была отправлена новая ссылка для проверки.</p>
                </div>
            </div>
        @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="block">
                            Спасибо за регистрацию! Прежде чем приступить к работе, не могли бы вы подтвердить свой email, перейдя по ссылке, которую мы отправили вам по электронной почте? Если вы не получили электронное письмо, мы с радостью отправим вам другое.
                        </div>
                        <div class="block">
                            <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Отправить email с подтверждением повторно
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="block">
                    <button type="submit" class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                        Выйти
                    </button>
                </div>
            </form>
    </x-auth-card>
</x-guest-layout>
