@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
<h1>NavBar </h1>
</div>
<div class="mb-2">
    <a href="{{ route('add_nav') }}" class="btn btn-primary">New Item</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>url</th>
            <th>Order</th>
            <th>Parnt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $navs as $nav )
        <tr>
            <td> {{$nav->id}}</td>
            <td> {{$nav->name}}</td>
            <td> {{$nav->url}}</td>
            <td> {{$nav->order}}</td>
            <td> {{$nav->parent}}</td>
            <td>
                <a href="{{ route('edit_nav', [ 'nav_id' => $nav->id ]) }}" class="btn btn-info btn-sm">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete_nav',['nav_id' => $nav->id ]) }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection