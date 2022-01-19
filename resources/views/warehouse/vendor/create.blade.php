@extends('layouts.master')
@section('title')
    Vendor
@endsection
@section('pageName')
    Vendor
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('warehouses.vendor.list') }}">All Vendors</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
@endsection

@section('scripts')
@endsection