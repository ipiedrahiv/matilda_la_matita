@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 padding-20">
            <div class="card">
                <div class="card-header">Admin</div>

                <div class="card-body">
                   Welcome to the admin page
                   <br /><br />
                   <a href="{{route('admin.create')}}">Create Seed</a>
                   <br /><br />
                   <a href="{{route('admin.list')}}">Delete Seed</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection