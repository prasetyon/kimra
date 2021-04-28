@extends('admin', ['title' => 'Jenis Pemeriksaan Tinjut'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.jenis-pemeriksaan-tinjut-component')
        </div>
    </div>
</div>
@endsection
