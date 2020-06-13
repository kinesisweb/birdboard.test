@extends('layouts.app')

@section('main')

@include('projects.partials.subheading')

<v-row>
    @forelse ($projects as $project)
    <v-col cols="12" md="6" lg="4">
        <v-card class="pt-2">
            <v-card-title class="bb_card-border">
                <a href="{{ $project->path() }}" class="text--primary">{{ $project->title }}</a>
            </v-card-title>
            <v-card-text class="text--disabled">{{ Str::limit($project->description, 100) }}</v-card-text>
        </v-card>
    </v-col>
    @empty 
    <v-col cols="12" class="text-center">No projects found</v-col>
    @endforelse
</v-row>
@endsection