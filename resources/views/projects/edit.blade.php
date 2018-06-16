@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$project->name}}</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos molestias, expedita odio culpa delectus voluptatum consequatur velit, vero dolorem provident error animi reprehenderit aspernatur unde sint accusantium veniam nemo sit.
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
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
</div>

<add-users-project-modal project-id="{{$project->id}}"></add-users-project-modal>

<div class="fixed-bottom production-footer bg-light border-top py-2">
    <div class="container d-flex justify-content-between">
        <form action="{{route('projects.delete', $project)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger mr-2">Delete this Project</button>
        </form>
    </div>
</div>
@endsection
