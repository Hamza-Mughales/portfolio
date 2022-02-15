@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
    <h1>{{ $edit == '1' ? "Edit project_name Details" : "Add Details To $project_name "}}</h1>
</div>
<div class="w-50 m-auto">
    <form class="" enctype="multipart/form-data" action="{{ $edit == 1 ? route('update_proj_details', ['id' => $id]) : route('create_proj_details', ['project_id' => $project_id]) }}" method="post">
        {{ csrf_field() }}
        <div class="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $title }}">
                <small class="text-danger">{{$errors->first('title')}}</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" value="{{ old('description') ? old('description') : $description }}">
                <small class="text-danger">{{$errors->first('description')}}</small>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control" name="img" >
                <small class="text-danger">{{$errors->first('img')}}</small>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" class="form-control" name="order" value="{{ old('order') ? old('order') : $order }}">
                <small class="text-danger">{{$errors->first('order')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">{{ $edit == 1 ? 'Save Changes' : 'Add' }}</button>
        </div>
    </form>
</div>
@endsection