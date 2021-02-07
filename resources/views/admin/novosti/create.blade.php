@extends('admin.admin_home')


@section('content')
<div class="container-fluid pt-5 pl-5 izbornik">
    <div class="row">
        <div class="col-md-3 col-12">
            @include('admin.izbornik')
        </div>
        <div class="col-12 col-md-8 p-0 mt-5 mt-md-0 ml-md-3 border rounded border-secondary sadrzaj">
            <div class="list-group-item naslov-sadrzaja pb-0">
                <p>Dodavanje novosti</p>
            </div>
            <div class="row m-2 p-1">
                <a href="{{ route('novosti.index') }}" class="btn btn-sm  btn-outline-success col-12 col-sm-3">Nazad na novosti</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="m-5" action="{{ route('novosti.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="naslov">Naslov</label>
                        <input type="text" class="form-control" id="naslov" placeholder="Naslov" name="naslov">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="datum">Datum</label>
                        <input type="date" class="form-control" id="datum" name="datum">
                    </div>
                    <div class="custom-file col-md-12 mt-4">
                        <input type="file" class="custom-file-input" id="slika" name="slika" 
                            accept="image/png, image/jpeg, image/jpg">
                        <label class="custom-file-label" for="slika">Umetni sliku</label>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="card-body">
                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5">Spasi novost</button>
            </form>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection