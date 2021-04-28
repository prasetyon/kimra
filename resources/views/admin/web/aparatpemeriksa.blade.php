@extends('admin', ['title' => 'Aparat Pemeriksa'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.aparat-pemeriksa-component')
        </div>
    </div>
</div>
@endsection
