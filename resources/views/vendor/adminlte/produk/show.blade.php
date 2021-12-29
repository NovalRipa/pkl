@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Tambahkan Data produk</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data produk</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama produk</label>
                        <input type="text" name="name_produk" value="{{$produk->nama_produk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/produk')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
