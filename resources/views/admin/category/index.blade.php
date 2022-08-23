@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="page-header">
                    <h2>All Categories</h2>
                </div>
                @foreach($categories as $category)
                <div class="card">
                    <div class="card-header">{{$category->title}}</div>

                    <div class="card-body">
                        {{$category->description}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection