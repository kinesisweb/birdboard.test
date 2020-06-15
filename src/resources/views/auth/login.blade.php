@extends('layouts.app')

@section('main')
<v-row>
    <v-col cols="12" md="8" offset-md="2">
        <v-card>
            <v-card-title>{{ __('Login') }}</v-card-title>

            <v-card-text>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <v-row>
                        <v-col cols="12">
                            <v-text-field id="email" name="email" label="{{ __('E-Mail Address') }}" outlined
                                prepend-inner-icon="mdi-at" error-messages="@error('email'){{ $message }}@enderror"
                                value="{{ old('email') }}" />
                        </v-col>

                        <v-col cols="12">
                            <v-text-field id="password" name="password" label="{{ __('Password') }}" outlined
                                prepend-inner-icon="mdi-lock" type="password"
                                error-messages="@error('password'){{ $message }}@enderror" />
                        </v-col>

                        <v-col cols="12" class="text-center">
                            @if (Route::has('password.request'))
                            <v-btn class="mr-8" color="warning" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </v-btn>
                            @endif
                            <v-btn type="submit" color="primary">{{ __('Login') }}</v-btn>
                        </v-col>
                </form>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
@endsection