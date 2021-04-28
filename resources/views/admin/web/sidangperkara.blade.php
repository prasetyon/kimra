@extends('admin', ['title' => 'Sidang Perkara'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.sidang-perkara-component')
        </div>
    </div>
</div>
@endsection
