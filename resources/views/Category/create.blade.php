@extends('layouts.frontend')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">
                        Categories List
                        <a href="{{url('category')}}" class="btn btn-primary float-end">Show All Categories</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST">

                        @csrf'
                        
                        <div class="mb-3">
                            <label class="fw-bold">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" style="resize: none;"></textarea>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Status</label> <br>
                            <input type="checkbox" name="status" checked style="width: 30px; height:30px;color:blue"> checked : visible | unchecked :hidden
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success w-25">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection