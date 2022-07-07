@extends('layouts.admin')
@section('pageTitle') {{ 'Categories' }} @endsection
@section('content')
<div>
    <livewire:admin.category.index />
</div>
@endsection
