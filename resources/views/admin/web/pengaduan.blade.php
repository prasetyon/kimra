@extends('admin', ['title' => 'Pengaduan'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.pengaduan')
        </div>
    </div>
</div>
@endsection
