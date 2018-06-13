@extends('layouts.app')

@section('content')
<div class="container">
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
                <add-users-project-button></add-users-project-button>
            </div>
            <div class="card">
                <div class="card-header">Users</div>
                <users-project-list 
                    project-id="{{ $project->id }}" 
                    endpoint="{{ route('plan.projects.users', [$plan, $project]) }}" 
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

                <question-list endpoint="{{ route('projects.questions.index', $project) }}"/>
            </div>
        </div>
    </div>
</div>

<add-users-project-modal project-id="{{$project->id}}" plan-id="{{ $plan->id }}"></add-users-project-modal>
@endsection
