<v-row class="justify-space-between align-end mb-2">
    <v-col cols="auto">
    @unless (Route::current()->getName() == 'projects')
    <div class="text--secondary"><a href="{{ route('projects') }}">My Projects</a> @isset($project->title) / {{$project->title}} @endisset</div>
    @else <div class="text--secondary">My Projects</div>
    @endunless
    </v-col>
    <v-col cols="auto">
        <v-btn color="primary" href="{{ route('projects.create') }}" small>Create New Project</v-btn>
    </v-col>
</v-row>