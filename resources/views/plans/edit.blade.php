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
                <a href="#" class="btn btn-primary">Add Projects to this Plan</a>
            </div>
            <div class="card">
                <div class="card-header">Projects</div>
                <plan-projects-list endpoint="{{route('plan.projects.index', $plan)}}" plan="{{$plan}}" />
            </div>
        </div>
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
