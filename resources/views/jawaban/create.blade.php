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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body pb-0">
                  <div class="form-group">
                    <label> {{ $pertanyaan->judul }} </label><br>
                    <small>{{ $pertanyaan->isi }}</small>
                  </div>
                </div>

                <div class="card-body pb-5 pt-0">
                  <div class="form-group">
                    <label>Jawaban</label><br>
                    @foreach ($jawaban as $jawab)
                        <span>  {{ $loop->iteration }}.&nbsp; {{ $jawab->isi }} </span><br>
                    @endforeach
                  </div>
                </div>

                <form role="form" action=" {{ route('jawaban.post', $pertanyaan->id) }} " method="POST">
                    {{ csrf_field() }}
                    <div class="card-body pt-0 pb-0">
                      <div class="form-group">
                        <input type="text" class="form-control" name="isi" placeholder="Masukkan Jawaban Kamu" required>
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.card-body -->
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
