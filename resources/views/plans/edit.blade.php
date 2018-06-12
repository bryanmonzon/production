@extends('layouts.app')

@section('content')
<div class="container" style="padding-bottom: 75px;">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$plan->name}}</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos molestias, expedita odio culpa delectus voluptatum consequatur velit, vero dolorem provident error animi reprehenderit aspernatur unde sint accusantium veniam nemo sit.
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2 text-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#projectPicker">Add Projects to this Plan</button>
            </div>
            <div class="card">
                <div class="card-header">Projects</div>
                <plan-projects-list endpoint="{{route('plan.projects.index', $plan)}}" plan="{{$plan}}" />
            </div>
        </div>
    </div>
</div>

<div class="modal" id="projectPicker" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="/wherevs" method="POST">
        @csrf
        @method('PATCH')
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Projects to this Plan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                @foreach($projects as $project)
                <div class="form-check">
                  <input class="form-check-input" name="planProjects[]" type="checkbox" value="{{$project->id}}" id="project-{{$project->id}}">
                  <label class="form-check-label" for="project-{{$project->id}}">
                    {{$project->name}}
                  </label>
                </div>
                @endforeach
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
    </form>
  </div>
</div>

<div class="fixed-bottom production-footer bg-light border-top py-2">
    <div class="container d-flex justify-content-between">
        <form action="{{route('plans.delete', $plan)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger mr-2">Delete this Plan</button>
        </form>
        <button type="button" class="btn btn-primary">Complete this Plan</button>
    </div>
</div>
@endsection
