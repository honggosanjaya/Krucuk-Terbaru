@extends('layouts.admin')

@section('title','Kategori')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Banner</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Banner</div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <a href="{{url('admin/banner/create')}}" class="btn btn-icon btn-lg btn-success"><i class="fas fa-plus"></i> Tambah Banner</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Full Width</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td><img src="{{Storage::url('public/banners/'.$banner->image)}}" alt="" width="120px"></td>
                                            <td>{{$banner->title}}</td>
                                            <td>
                                                @if ($banner->status == 1)
                                                    <div class="badge badge-success">Active</div>
                                                @else
                                                    <div class="badge badge-danger">Not Active</div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('banner.edit',$banner->id)}}" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                <form action="{{route('banner.destroy',$banner->id)}}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $no++
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
