@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2 text-right">
                <a href="{{route( 'projects.create' ) }}" class="btn btn-primary">New Project</a>
            </div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                @if($projects->count() > 0 )
                <div class="table-responsive">
                    <table class="table">
                        @foreach($projects as $project)
                        <tr>
                            <td><a href="{{route('projects.edit', $project)}}">{{$project->name}}</a></td>
                            <td class="text-right">{{ $project->completed ? 'Completed' : 'In-Progress' }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <div class="card-body">
                    No projects yet.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
