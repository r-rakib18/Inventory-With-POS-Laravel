@extends('layouts.master')
@section('title')
    Warehouse
@endsection
@section('pageName')
    Warehouse
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('warehouses.warehouse.list') }}">All Warehouses</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
@endsection

@section('scripts')
@endsection