@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">
                        Show Categories Details
                        <a href="{{url('category')}}" class="btn btn-danger float-end">Back To Home Page</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}" readonly>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" style="resize: none;" readonly>{{$category->description}}</textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection