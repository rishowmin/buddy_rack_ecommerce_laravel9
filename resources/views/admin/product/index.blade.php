@extends('layouts.admin')
@section('pageTitle') {{ 'Products' }} @endsection
@section('content')
<div>
    <!-- Category Delete Modal -->
    {{-- @include('admin.product.inc.deleteModal') --}}
    <!-- Alert Message -->
    @include('flash-message')
    <!-- Page Title & Pagination -->
    @include('admin.product.inc.pageHeader')
    <!-- Search Category -->
    {{-- @include('admin.product.inc.searchFilter') --}}

    {{-- <livewire:admin.product.index /> --}}
    hi
</div>
@endsection
