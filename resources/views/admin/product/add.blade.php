@extends('layouts.admin')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('css')
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/product/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'products' , 'key' => 'Add'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{  session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label >Tên sản phẩm: </label>
                                <input type="text" class="form-control"  placeholder="Nhập tên sản phẩm" name="name">
                            </div>

                            <div class="form-group">
                                <label >Ảnh đại diện: </label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label >Ảnh chi tiết: </label>
                                <input type="file" multiple class="form-control-file" name="image_path[]">
                            </div>

                            <div class="form-group">
                                <label >Chọn danh mục: </label>
                                <select class="form-control  category_select2" name = 'parent_id'>
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label >Nhập tags cho sản phẩm: </label>
                                <select class="form-control tags_select2" multiple="multiple" name="tags[]">

                                </select>
                            </div>

                            <div class="form-group">
                                <label >Mô tả sản phẩm: </label>
                                <textarea name="content" id="" cols="30" rows="5" class="form-control">

                                </textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin/product/add.js') }}"></script>

@endsection