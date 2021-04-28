@extends('admin', ['title' => 'Jenis Aduan'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.jenis-aduan-component')
        </div>
    </div>
</div>
@endsection
