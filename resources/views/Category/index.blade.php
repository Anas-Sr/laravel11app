@extends('layouts.frontend')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

        @if (session()->has('status'))
        <div class="alert alert-success">
        {{session('status')}}
        </div>
        @endif

            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">
                        Categories List
                        <a href="{{url('category/create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <tr>
                                <td class="fw-bold">ID</td>
                                <td class="fw-bold">Name</td>
                                <td class="fw-bold">Description</td>
                                <td class="fw-bold">Status</td>
                                <td class="fw-bold">Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->status ==1 ?'visible':'hidden'}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-success fw-bold me-2">Edit</a>
                                        <a href="{{route('category.show',$category->id)}}" class="btn btn-info fw-bold me-2">Show</a>
                                        <form action="{{route('category.destroy',$category->id)}}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection