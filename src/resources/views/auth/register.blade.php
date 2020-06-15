@extends('layouts.app')

@section('main')

<v-row>
    <v-col cols="12" md="8" offset-md="2">
        <v-card>
            <v-card-title>{{ __('Register') }}</v-card-title>

            <v-card-text>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <v-row>
                        <v-col cols="12">
                            <v-text-field id="name" name="name" label="{{ __('Name') }}" outlined
                                prepend-inner-icon="mdi-badge-account-horizontal-outline"
                                error-messages="@error('name'){{ $message }}@enderror" autofocus
                                value="{{ old('name') }}" />
                        </v-col>

                        <v-col cols="12">
                            <v-text-field id="email" name="email" label="{{ __('E-Mail Address') }}" outlined
                                prepend-inner-icon="mdi-at" error-messages="@error('email'){{ $message }}@enderror"
                                value="{{ old('email') }}" />
                        </v-col>

                        <bb-password-create error="@error('password'){{ $message }}@enderror"
                            label1="{{ __('Password') }}" label2="{{ __('Confirm Password') }}">
                        </bb-password-create>

                        <v-col cols="12" class="text-center">
                            <v-btn type="submit" color="primary">Submit</v-btn>
                        </v-col>
                </form>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
@endsection