@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
    <h1>{{ $edit == '1' ? 'Edit Project' : 'Add Project' }}</h1>
</div>
<div class="w-50 m-auto">
    <form class="" enctype="multipart/form-data" action="{{ $edit == 1 ? route('edit_project',['project_id'=> $project_id]) : route('create_project') }}" method="post">
        {{ csrf_field() }}
        <div class="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}">
                <small class="text-danger">{{$errors->first('name')}}</small>
            </div>
            <div class="form-group">
                <label for="short_desc">Short_desc</label>
                <input type="text" class="form-control" name="short_desc" value="{{ old('short_desc') ? old('short_desc') : $short_desc }}">
                <small class="text-danger">{{$errors->first('short_desc')}}</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description">{{ old('description') ? old('description') : $description }}</textarea>
                <small class="text-danger">{{$errors->first('description')}}</small>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" value="{{ old('url') ? old('url') : $url }}">
                <small class="text-danger">{{$errors->first('url')}}</small>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" class="form-control" name="order" value="{{ old('order') ? old('order') : $order }}">
                <small class="text-danger">{{$errors->first('order')}}</small>
            </div>
            <div class="form-group">
                <label for="main_img">Main_img</label>
                <input type="file" class="form-control" name="main_img" value="">
                <small class="text-danger">{{$errors->first('main_img')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">{{ $edit == 1 ? 'Save Changes' : 'Add' }}</button>
        </div>
    </form>
</div>
@endsection