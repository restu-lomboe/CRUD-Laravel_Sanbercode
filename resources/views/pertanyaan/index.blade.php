@extends('layouts.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Daftar Pertanyaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <!-- general form elements -->

            @if (session('success'))
                <div class="alert alert-success mt-2 mb-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pertanyaan</h3>
                    <a href=" {{ route('pertanyaan.create') }} " class="btn bg-gradient-success btn-sm float-right" title="Tambah Pertanyaan"><i class="fas fa-plus-square"></i></a>
                </div>
              <!-- /.card-header -->

                    <ul class="list-group">
                        @foreach ($pertanyaan as $tanya)
                        <form action="{{ route('pertanyaan.delete', $tanya->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $loop->iteration }}. &nbsp;
                                {{ $tanya->judul }}
                                <small> {{ $tanya->isi }} </small>
                                <div>
                                    <button type="submit" class="badge badge-danger badge-pill float-right border-0"><i class="fas fa-trash" title="Hapus Pertanyaan"></i></button>
                                    <a href="{{ route('pertanyaan.edit', $tanya->id) }}"><span class="badge badge-success badge-pill float-right mr-2" title="Update Pertanyaan"><i class="fas fa-edit"></i></span></a>
                                    <a href="{{ route('pertanyaan.detail', $tanya->id) }}"><span class="badge badge-warning badge-pill float-right mr-2" title="Lihat Jawaban"><i class="fas fa-eye"></i></span></a>
                                    <a href="{{ route('jawaban', $tanya->id) }}"><span class="badge badge-info badge-pill float-right mr-2" title="Jawab Pertanyaan"><i class="fas fa-reply"></i></span></a>
                                </div>
                            </li>
                        </form>
                        @endforeach
                    </ul>
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
