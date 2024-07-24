@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <livewire:pages.tasks.edit-task :$task :lazy="true" />
    </div>
@endsection
