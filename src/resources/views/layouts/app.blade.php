<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <v-app id="app">
        <v-app-bar app color="white">
            <v-toolbar-title>
                <bb-logo />
               <!-- {{ config('app.name', 'Laravel') }} -->
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- Authentication Links -->
            @guest
            <v-btn href="{{ route('login') }}" text>
                {{ __('Login') }}
            </v-btn>
            @if (Route::has('register'))
            <v-btn href="{{ route('register') }}" text>
                {{ __('Register') }}
            </v-btn>
            @endif
            @else
            <v-menu bottom offset-y>
                <template #activator="{ on, attrs }">
                    <v-btn v-on="on" v-bind="attrs" text>
                        <v-icon left>mdi-account</v-icon>
                        {{ Auth::user()->name }}
                        <v-icon right>mdi-menu-down</v-icon>
                    </v-btn>
                </template>
                <v-list>
                    <v-list-item @click.prevent="$refs.logoutForm.submit()">
                        <v-list-item-title>{{ __('Logout') }}</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
            <form ref="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </v-app-bar>
        <v-main class="bb_background">
            <v-container class="no-xl">
                @yield('main')
            </v-container>
        </v-main>
    </v-app>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>