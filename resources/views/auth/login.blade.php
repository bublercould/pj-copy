<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Auth Message -->
    @error('auth.result')
        <div class="mb-4 text-xl font-bold text-red-600 dark:text-red-400 space-y-1 text-center">
            {{ $message }}
        </div>
    @enderror

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('อีเมล์')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="text"
                name="email"
                :value="old('email')"
                autofocus
                autocomplete="username"
                placeholder="abc@example.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('รหัสผ่าน')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                autocomplete="current-password"
                placeholder="Password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('อยู่ในระบบตลอด') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('ลืมรหัสผ่าน?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('เข้าสู่ระบบ') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
