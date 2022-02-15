@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
    <h1>{{ $edit == '1' ? 'Edit Nav Item' : 'Add Nav Item' }}</h1>
</div>
<div class="w-50 m-auto">
    <form class="" action="{{ $edit == 1 ? route('update_nav', ['nav_id' => $nav_id]) : route('create_nav') }}" method="post">
    {{ csrf_field() }}    
    <div class="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}">
                <small class="text-danger">{{$errors->first('name')}}</small>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" value="{{ old('url') ? old('url') : $url }}">
                <small class="text-danger">{{$errors->first('url')}}</small>
            </div>
            <div class="d-flex">
                <div class="pl-0 form-group  col-sm-6">
                    <label for="order">Order</label>
                    <select class="form-control" name="order" value ="{{ old('order') ? old('order') : $order }}">
                        @for( $i=1 ; $i < 11 ; $i++ ) <option>{{ $i }}</option>
                            @endfor
                    </select>
                </div>
                <div class="pr-0 form-group col-sm-6">
                    <label for="parent">Parent</label>
                    <select class="form-control" name="parent" value="{{ old('parent') ? old('parent') : $parent }}">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ $edit == 1 ? 'Save Changes' : 'Add' }}</button>
        </div>
    </form>
</div>
@endsection