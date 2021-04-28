@extends('admin', ['title' => 'Jenis Status Tinjut'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.jenis-status-tinjut-component')
        </div>
    </div>
</div>
@endsection
