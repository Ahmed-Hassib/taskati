@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ Str::ucfirst(trans('tasks.add new')) }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                {{ Breadcrumbs::render('add-task') }}
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('dist/images/breadcrumb/ChatBc.png') }}" alt=""
                                class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tasks-container">
            <livewire:pages.tasks.create-task />
        </div>
    </div>
@endsection
