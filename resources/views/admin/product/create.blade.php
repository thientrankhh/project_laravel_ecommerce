@extends('admin.layouts.content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="container">
                    <h1 class="text text-bold">Thêm Sản Phẩm</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <nav class="navbar bg-dark">
                        <!-- Links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('product.index')}}"><button class="btn-primary px-3 py-1 border rounded"> Home</button></a>
                            </li>
                        </ul>
                    </nav>

                    <nav class="navbar bg-gradient-light">
                        <!-- Links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <form action="{{route('product.store')}}" role="form" method="post">
                                    @csrf
                                    <table class="table-striped">
                                        <tr>
                                            <th><label class="text-bold text-info" >Tên Sản Phẩm</label></th>
                                            <td>
                                                <input type="text" name="product_name" placeholder="Nhập tên sản phẩm" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Thể loại</label></th>
                                            <td>
                                                <select name="category_id" class="btn-block btn-secondary py-1">
                                                    <option value="">Chọn thể loại</option>
                                                    @foreach($categories as $value)
                                                    <option name="category_id" value="{{$value->category_id}}">{{$value->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <th><label class="text-bold text-info" >Thương hiệu</label></th>
                                            <td>
                                                <select name="origin_id" class="btn-block btn-secondary py-1">
                                                    <option value="">Chọn sản phẩm mới</option>
                                                    @foreach($origins as $value)
                                                    <option  value="{{$value->origin_id}}">{{$value->origin_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Giá chưa giảm</label></th>
                                            <td>
                                                <input type="number" name="price" placeholder="VND" class="form-control">
                                            </td>
                                            <th><label class="text-bold text-info" >Giá đã giảm</label></th>
                                            <td>
                                                <input type="number" name="actual_price" placeholder="VND" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Chương trình khuyến mãi</label></th>
                                            <td>
                                                <select name="promotion_id" class="btn-block btn-info py-1">
                                                    <option  value="1">Không khuyên mãi</option>
                                                    @foreach($promotions as $value)
                                                        @if(($value->promotion_id)!=1)
                                                            <option value="{{$value->promotion_id}}">{{$value->promotion_name}}---Mô tả: {{$value->promotion_description}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Số lượng</label></th>
                                            <td>
                                                <input type="number" name="quantity_instore" placeholder="Số lượng sản phẩm" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info">Cấu hình</label></th>
                                            <td>
                                                <textarea id="summernote" name="parameter" class="form-control" placeholder="Cấu hình"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Mô tả</label></th>
                                            <td>
                                                <textarea id="summernote" name="description" class="form-control" placeholder="Mô tả sản phẩm"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Bảo hành</label></th>
                                            <td>
                                                <input type="number" name="guarantee" placeholder="Số tháng bảo hành" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Ảnh nền</label></th>
                                            <td>
                                                <input type="file" name="image" id="image" class="form-control" required="true">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><label class="text-bold text-info" >Ảnh khác</label></th>
                                            <td>
                                                <input type="file" name="thumbail" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </table>


                                    <div class="form-group">
                                        <button type="submit" class="form-control btn-success px-5 py-2 py-1 border rounded">Thêm</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </nav>

                </div>

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection





