@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Concerns</div>
                <div class="card-body">
                    <new-concern endpoint="{{route('projects.concerns.store', $project) }}" project-id="{{$project->id}}" />
                </div>

                <concern-list endpoint="{{ route('projects.concerns.index', $project) }}" project-id="{{$project->id}}" />
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$plan->name}} - {{ $project->name}}</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos molestias, expedita odio culpa delectus voluptatum consequatur velit, vero dolorem provident error animi reprehenderit aspernatur unde sint accusantium veniam nemo sit.
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="mb-2 text-right">
                
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Users</span>
                    <add-users-project-button></add-users-project-button>
                </div>
                <users-project-list 
                    project="{{ $project }}" 
                    endpoint="{{ route('projects.users', $project) }}" 
                >
                </users-project-list>

            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questions</div>
                <div class="card-body">
                    <new-question endpoint="{{route('projects.questions.store', $project) }}" />
                </div>

                <question-list endpoint="{{ route('projects.questions.index', $project) }}" project-id="{{$project->id}}"/>
            </div>
        </div>
    </div>
</div>

<add-users-project-modal project-id="{{$project->id}}" plan-id="{{ $plan->id }}"></add-users-project-modal>
@endsection
