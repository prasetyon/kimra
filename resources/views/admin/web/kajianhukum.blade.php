@extends('admin', ['title' => 'Kajian Hukum'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('file-referensi-component', ['type' => 'Kajian Hukum'])
        </div>
    </div>
</div>
@endsection
