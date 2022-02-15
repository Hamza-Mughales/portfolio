@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
    <h1>{{ $edit == '1' ? 'Edit Skill' : 'Add Skill' }}</h1>
</div>
<div class="w-50 m-auto">
    <form class="" action="{{ $edit == 1 ? route('edit_skill',['skill_id'=> $skill_id]) : route('create_skill') }}" method="post">
        {{ csrf_field() }}
        <div class="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}">
                <small class="text-danger">{{$errors->first('name')}}</small>
            </div>
            <div class="form-group">
                <label for="percentage">Percentage</label>
                <input type="text" class="form-control" name="percentage" value="{{ old('percentage') ? old('percentage') : $percentage }}">
                <small class="text-danger">{{$errors->first('percentage')}}</small>
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" class="form-control" name="order" value="{{ old('order') ? old('order') : $order }}">
                <small class="text-danger">{{$errors->first('order')}}</small>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" value="{{ old('type') ? old('type') : $type }}">
                <small class="text-danger">{{$errors->first('type')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">{{ $edit == 1 ? 'Save Changes' : 'Add' }}</button>
        </div>
    </form>
</div>
@endsection