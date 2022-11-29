@php
$translateTable = config('table.translate.table');
$translateFillable = config('table.translate.fillable');
$tableProperties = config('table.table.' . $table);
@endphp
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
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
                                <h3 class="card-title">Table {{ $table ?? '' }}</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="{{ route($table . '.create') }}">
                                            <button type="submit" class="btn btn-default">

                                                <i class="far fa-plus-square"></i>
                                                <span style="padding-left: 5px">
                                                    Thêm {{ $translateTable[$table] }}</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (!empty($data[0]))
                                    <table class="table table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                @foreach (json_decode($data[0], true) as $key => $value)

                                                    @if ($key != 'password')
                                                        <th>{{ $translateFillable[$key] }} </th>
                                                    @endif

                                                @endforeach
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
                                                    @foreach (json_decode($item, true) as $key => $value)
                                                        @if ($key != 'password')
                                                            @if (isset($tableProperties[$key]) && is_array($tableProperties[$key]))
                                                                @php
                                                                    $get = $tableProperties[$key]['foreign']['get'];
                                                                    $fill = $tableProperties[$key]['foreign']['display'];
                                                                @endphp
                                                                <td>
                                                                    {{ $item->$get->$fill }}
                                                                </td>
                                                            @elseif($key == 'Avatar' || $key == "Image")
                                                                <td style="background-size: 200px;width:200px; height:200px; background-image:url('Avatar/{{ $value }}');"></td>
                                                            @else
                                                                <td>{{ $value }}</td>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    <td>
                                                        <a href="{{ route($table . '.edit', $item->id) }}">sua</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
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
