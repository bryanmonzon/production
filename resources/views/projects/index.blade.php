@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2 d-flex flex-row-reverse">
                <new-project />
            </div>
            <div class="card">
                <div class="card-header">Projects</div>
                
                <projects-list endpoint="{{route('projects.all')}}" />
            </div>
        </div>
    </div>
</div>
@endsection
