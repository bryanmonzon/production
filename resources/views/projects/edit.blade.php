@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$project->name}}</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos molestias, expedita odio culpa delectus voluptatum consequatur velit, vero dolorem provident error animi reprehenderit aspernatur unde sint accusantium veniam nemo sit.
                </div>
            </div>
        </div>
    </div>
</div>
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
