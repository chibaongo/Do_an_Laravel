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
                        <h1 class="m-0">{{ isset($id) ? "Sửa" : "Thêm" }} Giỏ hàng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route($table.'.index') }}">Giỏ hàng</a></li>
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
                    <h3 class="card-title">Giỏ hàng</h3>
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
                            <label for="AccountId">Email khách hàng</label>
                            <select class="custom-select" required name="AccountId">
                                @foreach ($dataForeign['account'] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($id) && $data->AccountId == $item->id ? 'selected' : '' }}>
                                        {{ $item->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ProductId">Sản phẩm</label>
                            <select class="custom-select" required name="ProductId">
                                @foreach ($dataForeign['product'] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($id) && $data->ProductId == $item->id ? 'selected' : '' }}>
                                        SKU: {{ $item->SKU }} - Tên sản phẩm: {{ $item->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Quantity">Số lượng</label>
                            <input type="number" min="0" step="1" class="form-control" id="Quantity" name="Quantity" placeholder="Nhập số lượng"
                                value="{{ isset($id) ? $data->Quantity : '' }}">
                        </div>
                        {{--  <div class="form-group">
                            <label for="Description">Mô tả</label>
                            <input type="text" class="form-control" id="Description" name="Description" placeholder="Nhập mô tả"
                                value="{{ isset($id) ? $data->Description : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Price">Giá</label>
                            <input type="number" min="0" step="1" class="form-control" id="Price" name="Price" placeholder="Nhập giá"
                                value="{{ isset($id) ? $data->Price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Stock">Giảm giá (%)</label>
                            <input type="number" min="0" step="1" max="100" class="form-control" id="Stock" name="Stock" placeholder="Nhập giảm giá"
                                value="{{ isset($id) ? $data->Stock : '' }}">
                        </div>  --}}
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
