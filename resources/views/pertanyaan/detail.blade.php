@extends('layouts.master')

@section('content')
<style>
    .direct-chat-text::after{
        border-right-color: #007bff!important;
    }
</style>
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
                            <h3> {{ $pertanyaan->judul }} </h3>
                            <small>Create {{ date('d-F-Y', strtotime($pertanyaan->created_at)) }}</small>&nbsp;|
                            <small>Update {{ date('d-F-Y', strtotime($pertanyaan->updated_at)) }}</small><br><br>
                            <span>{{ $pertanyaan->isi }}</span>
                        </div>
                    </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->

            </div>
            <!-- /.row -->
            <div class="card direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>

                    <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary"> {{ count($pertanyaan->jawaban) }} </span>
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                        Komentar
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button> --}}
                    </div>
                </div>
                <!-- DIRECT CHAT -->
                <!-- /.card-header -->
                <div class="card-body pt-0">
                    <!-- Conversations are loaded here -->
                    <div class="p-4">
                        <!-- Message. Default to the left -->
                        @foreach ($pertanyaan->jawaban as $jawab)
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left mb-1">User Name (Masih Belum Ada)</span>
                                    <span class="direct-chat-timestamp float-right">{{ date('d-F-Y', strtotime($jawab->created_at)) }}</span>
                                </div>
                                {{-- <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img --> --}}
                                <span class="direct-chat-img"><i class="fas fa-user fa-2x"></i></span>
                                <div class="direct-chat-text bg-primary text-white">
                                    {{ $jawab->isi }}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                        @endforeach
                        <!-- /.direct-chat-msg -->
                    </div>
                    <!--/.direct-chat-messages-->
                </div>
                <!-- /.card-body -->
                <!--/.direct-chat -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection

@push('script')

@endpush
