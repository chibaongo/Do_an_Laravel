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
                        <h1 class="m-0">Create Account</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Account</a></li>
                            <li class="breadcrumb-item active">{{ isset($id) ? 'Update' : 'Create' }}</li>
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
                        @foreach ($tableProperties[$table] as $key => $value)
                            @if (is_array($value))
                                @if (key($value) == 'foreign')
                                    <div class="form-group">
                                        <label>{{ $translate[$key] }}</label>
                                        <select class="custom-select" required name="{{ $key }}">
                                            {{-- @foreach ($data as $item)
                                                @php
                                                    $get = $value['foreign']['get'];
                                                    $fill = $value['foreign']['display'];
                                                @endphp
                                                <option value="{{ $item->$get->id }}">
                                                    {{ $item->$get->$fill }}
                                                </option>
                                            @endforeach --}}
                                            @php
                                                $get = $value['foreign']['get'];
                                                $fill = $value['foreign']['display'];
                                            @endphp
                                            @foreach ($data[$get] as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ isset($id) && $item->id == $id ? 'selected' : '' }}>
                                                    {{ $item->$fill }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            @elseif($value == 'password')
                                @if (!isset($id))
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ $translate[$key] }}</label>
                                        <input required type="{{ $value }}" class="form-control"
                                            id="exampleInputEmail1" name="{{ $key }}"
                                            placeholder="Enter {{ $key }}">
                                    </div>
                                @endif
                            @elseif ($value == 'text' || $value == 'email')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ $translate[$key] }}</label>
                                    <input required type="{{ $value }}" class="form-control"
                                        id="exampleInputEmail1" name="{{ $key }}"
                                        placeholder="Enter {{ $key }}"
                                        value="{{ isset($id) ? $dataId->$key : '' }}">
                                </div>
                            @elseif($value == 'check')
                                <label for="exampleInputEmail1">{{ $translate[$key] }}</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1"
                                        name="{{ $key }}"
                                        {{ isset($id) && $dataId->$key == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="exampleCheck1">{{ $translate[$key] }}</label>
                                </div>
                            @elseif($value == 'file')
                                <div class="form-group" style="height:254px;">
                                    <label for="">{{ $key }}</label>
                                    <div class="custom-file">
                                        <input type="file" value="{{ isset($id) ? public_path('Avatar/'.$dataId->$key) : '' }}" class="form-control" id="image_input_{{ $key }}" onchange="LoadImage(this, '#image_{{ $key }}')" name="{{ $key }}" accept="image/png, image/jpg">
                                        <img id="image_{{ $key }}" src="#" alt="your image" style="border: 2px solid; display:none; width:200px; height:200px;">
                                    </div>
                                </div>
                                @if(isset($id))
                                @php
                                    $path = 'Avatar/'.$dataId->$key;
                                @endphp
                                @endif
                            @elseif($value == 'number')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ $translate[$key] }}</label>
                                    <input required min="0" step="1" type="{{ $value }}" class="form-control"
                                        id="exampleInputEmail1" name="{{ $key }}"
                                        placeholder="Enter {{ $translate[$key] }}"
                                        value="{{ isset($id) ? $dataId->$key : '' }}">
                                </div>
                                {{-- @elseif() --}}

                            @endif
                            @php
                                $value;
                            @endphp
                        @endforeach

                        {{-- <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div> --}}
                        {{-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
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
