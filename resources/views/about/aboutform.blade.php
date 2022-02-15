@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
    <h1>{{ $edit == '1' ? 'Edit About' : 'Add About' }}</h1>
</div>
<div class="w-50 m-auto">
    <form class="" action="{{ $edit == 1 ? route('edit_about',['about_id'=> $about_id]) : route('create_about') }}" 
        method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}">
                <small class="text-danger">{{$errors->first('name')}}</small>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $phone }}">
                <small class="text-danger">{{$errors->first('phone')}}</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $email }}">
                <small class="text-danger">{{$errors->first('email')}}</small>
            </div>
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $title }}">
                <small class="text-danger">{{$errors->first('title')}}</small>
            </div>
            <div class="form-group">
                <label for="img">img</label>
                <input type="file" class="form-control" name="img" >
                <small class="text-danger">{{$errors->first('img')}}</small>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" >{{ old('description') ? old('description') : $description }}</textarea>
                <small class="text-danger">{{$errors->first('description')}}</small>
            </div>
            <div class="form-group">
                <label for="cv">My C.V</label>
                <input type="file" class="form-control" name="cv" >
                <small class="text-danger">{{$errors->first('cv')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">{{ $edit == 1 ? 'Save Changes' : 'Add' }}</button>
        </div>
    </form>
</div>
@endsection