@php
$translate = config('table.translate.fillable');
$tableProperties = config('table.table');
@endphp
@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ isset($id) ? "Sửa" : "Thêm" }} Loại sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route($table.'.index') }}">Loại sản phẩm</a></li>
                            <li class="breadcrumb-item active">{{ isset($id) ? 'Sửa' : 'Thêm' }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">loại sản phẩm</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ isset($id) ? route($table . '.update', $id) : route($table . '.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($id))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Nhập tên sản phẩm"
                                value="{{ isset($id) ? $data->Name : '' }}">
                        </div>                       
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
