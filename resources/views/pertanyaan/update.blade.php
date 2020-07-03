@extends('layouts.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pertanyaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('pertanyaan') }} ">Home</a></li>
                <li class="breadcrumb-item active">Pertanyaan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success mt-2 mb-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pertanyaan</h3>
                        <div class="float-right">
                            <span>Created {{ date('d-F-Y', strtotime($pertanyaan->created_at)) }}</span>
                        </div>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                        {{-- <div class="card-body pb-0">
                        <div class="form-group">
                            <label> {{ $pertanyaan->judul }} </label><br>
                            <small>{{ $pertanyaan->isi }}</small>
                        </div>
                        </div> --}}
                        <form class="form-horizontal" action=" {{ route('pertanyaan.update', $pertanyaan->id) }} " method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="judul" value="{{ $pertanyaan->judul }}" placeholder="Masukkan Judul Pertanyaan kamu ...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Isi</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="isi" value="{{ $pertanyaan->isi }}" placeholder="Masukkan isi Pertanyaan kamu ...">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <span>Updated {{ date('d-F-Y', strtotime($pertanyaan->updated_at)) }}</span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <button type="submit" class="btn btn-info float-right">Update</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection

@push('script')

@endpush
