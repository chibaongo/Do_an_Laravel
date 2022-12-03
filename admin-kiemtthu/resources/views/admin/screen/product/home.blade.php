@extends('admin.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Trang chủ</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Bảng sản phẩm</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="{{ route($table.'.create') }}">
                                            <button type="submit" class="btn btn-default">

                                                <i class="far fa-plus-square"></i>
                                                <span style="padding-left: 5px">
                                                    Thêm sản phẩm</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <table class="table table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>SKU</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Tồn kho</th>
                                                <th>Loại sản phẩm</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Thời gian tạo</th>
                                                <th>Thời gian sửa</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $stt = ($data->currentPage() - 1) * $data->perPage();
                                        @endphp
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ ++$stt }}</td>
                                                    <td>{{ $item->SKU }}</td>
                                                    <td>{{ $item->Name }}</td>
                                                    <td>{{ $item->Price }}</td>
                                                    <td>{{ $item->Stock }} </td>
                                                    <td>{{ $item->productType->Name }}</td>
                                                    <td style="background-size: 200px;width:200px; height:200px; background-image:url('Avatar/{{ $item->Image }}');"></td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td>
                                                        <div
                                                            style="display: flex; justify-content: space-around; align-items: center;">
                                                            <a href="{{ route($table.'.edit', $item->id) }}"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route($table.'.destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    style="background: transparent; border:0px; padding: 0px; margin:0px;">
                                                                    <i class="fas fa-trash"
                                                                        style="color: rgb(255, 0, 0);"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix" style="display: flex; justify-content: flex-end;">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
