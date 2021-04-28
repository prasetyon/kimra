@extends('admin', ['title' => 'Reset Password'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @livewire('reset-password')
        </div>
    </div>
</div>
@endsection
