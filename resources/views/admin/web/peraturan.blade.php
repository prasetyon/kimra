@extends('admin', ['title' => 'Peraturan'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('file-referensi-component', ['type' => 'Peraturan'])
        </div>
    </div>
</div>
@endsection
