<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recognizer</title>
        <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body style="background-color: black">
        <div id="app" class="min-h-screen w-full flex flex-col text-gray-300">
            <div class="flex bg-gray-800">
                <div class="flex mx-auto container max-w-screen-md p-4">
                    <div class="flex-1 justify-start my-auto">
                        <a href="/checklist" class="py-2 font-bold text-teal-300">
                            Recognizer
                        </a>
                    </div>
                    <div class="flex justify-center my-auto">
                        @auth
                        <Incremental-Search-Box
                            next-Text="{{ __('pagination.next') }}"
                            previous-Text="{{ __('pagination.previous') }}"
                        ></Incremental-Search-Box>
                        @endauth
                    </div>
                    <div class="flex justify-center px-2">
                        @if(app()->getLocale() === 'ja')
                            <a href="{{ route('locale', ['key' => 'en']) }}">
                                🇬🇧 English
                            </a>
                        @else
                            <a href="{{ route('locale', ['key' => 'ja']) }}">
                                🇯🇵 日本語
                            </a>
                        @endif
                    </div>
                    <ul class="flex justify-end my-auto">
                        @auth
                        <li class="px-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">
                                    {{ __('messages.logout') }}
                                </button>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="px-2">
                            <a href="/login" class="py-2">
                                {{ __('messages.login') }}
                            </a>
                        </li>
                        <li class="px-2">
                            <a href="/register" class="py-2">
                                {{ __('messages.register') }}
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="flex-1 bg-black mx-auto container max-w-screen-md">
                <div class="mt-4 mb-1 mx-1 md:max-w-full md:flex border border-solid border-gray-300">
                    @yield('content')
                </div>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
