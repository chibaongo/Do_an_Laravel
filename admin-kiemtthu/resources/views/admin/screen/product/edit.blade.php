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
                        <h1 class="m-0">{{ isset($id) ? "Sửa" : "Thêm" }} Sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route($table.'.index') }}">Sản phẩm</a></li>
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
                    <h3 class="card-title">Sản phẩm</h3>
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
                            <label for="SKU">Mã sản phẩm</label>
                            <input type="text" class="form-control" id="SKU" name="SKU" placeholder="Nhập mã sản phẩm"
                                value="{{ isset($id) ? $data->SKU : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="Name" name="Name" placeholder="Nhập tên sản phẩm"
                                value="{{ isset($id) ? $data->Name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Price">Giá</label>
                            <input type="number" class="form-control" id="Price" name="Price" placeholder="Nhập số giá"
                                value="{{ isset($id) ? $data->Price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Stock">Giảm Giá %</label>
                            <input type="number" min=0 max="100" step="1" class="form-control" id="Stock" name="Stock" placeholder="Nhập số Giảm Giá %"
                                value="{{ isset($id) ? $data->Stock : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="ProductTypeId">Loại sản phẩm</label>
                            <select class="custom-select" required name="ProductTypeId">
                                @foreach ($dataForeign['productType'] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($id) && $data->ProductTypeId == $item->id ? 'selected' : '' }}>
                                        {{ $item->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Description">Mô tả</label>
                            <input type="text" class="form-control" id="Description" name="Description" placeholder="Nhập số mô tả"
                                value="{{ isset($id) ? $data->Description : '' }}">
                        </div>
                        <div class="form-group" style="height:254px;">
                            <label for="">Ảnh sản phẩm</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="image_input_Avatar"
                                    onchange="LoadImage(this, '#image_Avatar')" name="Image"
                                    accept="image/gif, image/jpeg, image/png">
                                <img id="image_Avatar" alt="your image"
                                    style="border: 2px solid; {{ isset($id) ? '' : 'display:none;' }} height:200px;"
                                    src="{{ isset($id) ? 'Avatar/'.$data->Avatar : ''}}"
                                    >
                            </div>
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
