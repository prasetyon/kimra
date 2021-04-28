@if(session('alert-success'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class='alert alert-success alert-dismissible' id="alert">
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> {{session('alert-success')}}</h4>
                </div>
            </div>
        </div>
    </div>
@elseif(session('alert-danger'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class='alert alert-danger alert-dismissible' id="alert">
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-cross'></i> {{session('alert-danger')}}</h4>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class='alert alert-danger alert-dismiss'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
