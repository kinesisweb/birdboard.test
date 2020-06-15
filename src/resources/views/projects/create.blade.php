@extends('layouts.app')

@section('main')

<v-row>
    <v-col cols="8" offset="2">
        <v-card class="mt-8 pt-8">
            <v-card-title class="justify-center">Let's start something new</v-card-title>
            <v-card-text class="pa-8">
                <bb-create-project-form title="{{ old('title') }}" description="{{ old('description') }}"
                    errors-raw="{{ $errors }}" action="{{ route('projects') }}" csrf="{{ csrf_token() }}">
                </bb-create-project-form>
            </v-card-text>
        </v-card>
    </v-col>
</v-row>
@endsection