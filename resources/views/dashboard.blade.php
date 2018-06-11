@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2 text-right">
                <a href="{{route( 'plans.create' ) }}" class="btn btn-primary">New Plan</a>
            </div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                @if($plans->count() > 0 )
                <div class="table-responsive">
                    <table class="table">
                        @foreach($plans as $plan)
                        <tr>
                            <td><a href="{{route('plans.edit', $plan)}}">{{$plan->name}}</a></td>
                            <td>{{$plan->projects->count()}} {{ str_plural('project', $plan->projects->count() ) }}</td>
                            <td class="text-right">{{ $plan->completed ? 'Completed' : 'In-Progress' }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <div class="card-body">
                    No plans yet.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
