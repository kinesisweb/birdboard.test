@extends('layouts.app')

@section('main')

@include('projects.partials.subheading')


<main>
    <v-row>
        <v-col cols="12">
            <div class="text--secondary text-h6">Tasks</div>
        </v-col>
        <v-col cols="12" md="9">
            <article class="mb-6">
                @foreach ($project->tasks as $task)
                <v-card>
                    <v-card-text class="mb-3 pb-1">
                        <bb-project-task-update
                            error="@error('body','update-task-' . $task->id) {{ $message }} @enderror"
                            :id="{{ $task->id }}" csrf="{{ csrf_token() }}" path="{{ $task->path() }}"
                            body="{{ $task->body }}" :completed="{{ $task->completed ? 'true' : 'false' }}" />
                    </v-card-text>
                </v-card>
                @endforeach

                <v-card>
                    <v-card-text class="py-0">
                        <bb-add-project-task-form title="{{ old('body') }}" errors-raw="{{ $errors }}"
                            action="{{ $project->path() . '/tasks' }}" csrf="{{ csrf_token() }}">
                        </bb-add-project-task-form>
                    </v-card-text>
                </v-card>
            </article>
            <article class="mb-6">
                <div class="text--secondary text-h6 mb-4">General Notes</div>
                <v-form method="POST" action="{{ $project->path() }}">
                    @csrf
                    @method('PATCH')
                    <v-card>
                        <v-card-text>
                            <v-textarea outlined name="notes" value="{{ $project->notes }}"
                                placeholder="Anything else you want to make a note of?"></v-textarea>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="primary" type="submit">Save Notes</v-btn>
                        </v-card-actions>
                    </v-card>
                </v-form>
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