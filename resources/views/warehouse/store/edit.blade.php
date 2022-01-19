@extends('layouts.master')
@section('title')
    Store
@endsection
@section('pageName')
    Store List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('warehouses.store.list') }}">All Stores</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
@endsection

@section('scripts')
@endsection