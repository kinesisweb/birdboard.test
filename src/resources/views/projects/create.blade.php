@extends('layouts.app')

@section('main')

<h1>Create a New Project</h1>
<bb-create-project-form title="{{ old('title') }}" description="{{ old('description') }}" errors-raw="{{ $errors }}" action="{{ route('projects') }}" csrf="{{ csrf_token() }}">
</bb-create-project-form>

@endsection