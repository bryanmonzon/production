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
                
                <projects-list />
            </div>
        </div>
    </div>
</div>
@endsection
