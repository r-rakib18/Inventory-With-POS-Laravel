@extends('layouts.master')
@section('title')
    Vendor
@endsection
@section('pageName')
    Vendor List
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
    <li class="breadcrumb-item"><a href=" {{ route('warehouses.vendor.list') }}">All Vendors</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
@endsection

@section('scripts')
@endsection