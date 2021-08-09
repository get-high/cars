<x-guest-layout>
    <x-auth-card>
        <h1 class="text-black text-3xl font-bold mb-4">Забыли пароль?</h1>
        <x-panels.errors />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <div class="block">
                        Не проблема. Введите свой email и мы вышлем вам ссылку для сброса пароля.
                    </div>
                    <x-input.group name="email" label="Email">
                        <input id="email" name="email" value="{{ old('email') }}" type="email" class="mt-1 block w-full rounded-md @error('email') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="" required autofocus />
                    </x-input.group>
                    <div class="block">
                        <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Отправить ссылку для сброса пароля
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
