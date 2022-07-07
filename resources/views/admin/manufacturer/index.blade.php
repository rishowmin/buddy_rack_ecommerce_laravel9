@extends('layouts.admin')
@section('pageTitle') {{ 'Manufacturers' }} @endsection
@section('content')
<div>
    <livewire:admin.manufacturer.index />
</div>
@endsection
