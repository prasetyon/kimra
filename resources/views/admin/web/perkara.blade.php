@extends('admin', ['title' => 'Perkara Advokasi'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('admin.perkara')
        </div>
    </div>
</div>
@endsection
