@extends('layouts.app')

@section('main')

@include('projects.partials.subheading')

<main>
    <v-row>
        <v-col cols="12" md="9">
            <article class="mb-6">
                <div class="text--secondary text-h6 mb-2">Tasks</div>
                @foreach ($project->tasks as $task)
                <v-card>
                    <v-card-text class="mb-3">
                       {{ $task->body }}
                    </v-card-text>
                </v-card>
                @endforeach
                <v-card>
                    <v-card-text class="py-0">
                        <bb-add-project-task-form title="{{ old('body') }}" errors-raw="{{ $errors }}" action="{{ $project->path() . '/tasks' }}" csrf="{{ csrf_token() }}">
                        </bb-add-project-task-form>
                    </v-card-text>
                </v-card>
            </article>
            <article class="mb-6">
                <div class="text--secondary text-h6 mb-2">General Notes</div>
                <v-card>
                    <v-card-text>
                        <v-textarea outlined value="Lorum Ipsum" name="generalnotes"></v-textarea>
                    </v-card-text>
                </v-card>
            </article>
        </v-col>
        <v-col cols="12" md="3">
            <v-card class="pt-2">
                <v-card-subtitle class="bb_card-border font-weight-black">{{ $project->title }}</v-card-subtitle>
                <v-card-text>{{ $project->description }}</v-card-text>
            </v-card>
        </v-col>
    </v-row>
</main>

@endsection