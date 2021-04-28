@extends('admin', ['title' => 'Unit'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.unit')
        </div>
    </div>
</div>
@endsection
