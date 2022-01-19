@extends('layouts.master')
@section('title')
    Warehouse
@endsection
@section('pageName')
    Warehouse List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('warehouses.warehouse.list') }}">All Warehouses</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
@endsection

@section('scripts')
@endsection