@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2 d-flex flex-row-reverse">
                <a href="{{route( 'plans.create' ) }}" class="btn btn-primary">New Plan</a>
{{--                 <form class="form-inline">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Project Name">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Button</button>
                      </div>
                    </div>
                </form> --}}
            </div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <plans-list />
            </div>
        </div>
    </div>
</div>
@endsection
