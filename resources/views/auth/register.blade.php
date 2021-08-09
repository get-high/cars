<x-guest-layout>
    <x-auth-card>
        <h1 class="text-black text-3xl font-bold mb-4">Регистрация</h1>
        <x-panels.errors />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <x-input.group name="name" label="Имя">
                        <input id="name" name="name" value="{{ old('name') }}" type="text" class="mt-1 block w-full rounded-md @error('name') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Имя" required autofocus />
                    </x-input.group>
                    <x-input.group name="email" label="Email">
                        <input id="email" name="email" value="{{ old('email') }}" type="email" class="mt-1 block w-full rounded-md @error('email') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email" required />
                    </x-input.group>
                    <x-input.group name="password" label="Пароль">
                        <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md @error('password') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Пароль" required autocomplete="new-password" />
                    </x-input.group>
                    <x-input.group name="password_confirmation" label="Подтверждение пароля">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md @error('password_confirmation') border-red-600 @enderror border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Подтверждение пароля" required />
                    </x-input.group>
                    <div class="block">
                        <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
