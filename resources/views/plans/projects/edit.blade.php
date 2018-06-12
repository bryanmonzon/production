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
                    <div>
                        <form action="">
                            <div class="form-group">
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group d-flex flex-row-reverse">
                                <button class="btn btn-primary">Ask a Question</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="list-group">
                  <div class="list-group-item d-flex justify-content-between">
                    <span class="w-75">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum necessitatibus itaque praesentium, voluptate ratione tempore magni illo dolor, quod non, natus mollitia sapiente. Illum laborum hic optio corrupti quaerat itaque.
                        asked by Jen Kim
                    </span>
                    <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                        <span class="mr-2">Mark as resolved</span>
                        <input type="checkbox" id="question-1">
                    </label>
                  </div>
                  <div class="list-group-item d-flex justify-content-between">
                    <span class="w-75">Dapibus ac facilisis in</span>
                    <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                        <span class="mr-2">Mark as resolved</span>
                        <input type="checkbox" id="question-1">
                    </label>
                  </div>
                  <div class="list-group-item d-flex justify-content-between">
                    <span class="w-75">Morbi leo risus</span>
                    <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                        <span class="mr-2">Mark as resolved</span>
                        <input type="checkbox" id="question-1">
                    </label>
                  </div>
                  <div class="list-group-item d-flex justify-content-between">
                    <span class="w-75">Porta ac consectetur ac</span>
                    <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                        <span class="mr-2">Mark as unresolved</span>
                        <input type="checkbox" id="question-1" checked>
                    </label>
                  </div>
                  <div class="list-group-item d-flex justify-content-between">
                    <span class="w-75">Vestibulum at eros</span>
                    <label style="margin-bottom:0px;" for="question-1" class="w-25 text-muted text-sm-left mr-1 d-flex justify-content-end align-items-center">
                        <span class="mr-2">Mark as resolved</span>
                        <input type="checkbox" id="question-1">
                    </label>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<add-users-project-modal project-id="{{$project->id}}" plan-id="{{ $plan->id }}"></add-users-project-modal>
@endsection
