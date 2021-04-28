@extends('admin', ['title' => 'Jenis Perkara'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('jenis-perkara-component')
        </div>
    </div>
</div>
@endsection
