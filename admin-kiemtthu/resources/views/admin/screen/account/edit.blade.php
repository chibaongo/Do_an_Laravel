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
                        <h1 class="m-0">{{ isset($id) ? "Sửa" : "Thêm" }} Tài Khoản</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route($table.'.index') }}">Tài Khoản</a></li>
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
                    <h3 class="card-title">Account</h3>
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
                            <label for="Fullname">Họ và tên</label>
                            <input type="text" class="form-control" id="Fullname" name="Fullname" placeholder="Nhập họ tên"
                                value="{{ isset($id) ? $data->FullName : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Username">Tên tài khoản</label>
                            <input type="text" class="form-control" id="Username" name="Username" placeholder="Nhập tên tài khoản"
                                value="{{ isset($id) ? $data->Username : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email"
                                value="{{ isset($id) ? $data->email : '' }}">
                        </div>
                        @isset($id)
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        @endisset
                        <div class="form-group">
                            <label for="Phone">Số điện thoại</label>
                            <input type="number" class="form-control" id="Phone" name="Phone" placeholder="Nhập số điện thoại"
                                value="{{ isset($id) ? $data->Phone : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="Address">Địa chỉ</label>
                            <input type="text" class="form-control" id="Address" name="Address" placeholder="Nhập địa chỉ"
                                value="{{ isset($id) ? $data->Address : '' }}">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="IsAdmin" name="IsAdmin" {{ isset($id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="IsAdmin">Là Admin</label>
                            </div>
                        </div>
                        <div class="form-group" style="height:254px;">
                            <label for="">Ảnh đại diện</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="image_input_Avatar"
                                    onchange="LoadImage(this, '#image_Avatar')" name="Avatar"
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
