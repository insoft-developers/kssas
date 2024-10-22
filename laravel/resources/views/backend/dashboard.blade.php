@extends('backend.master')
@section('content')
 
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $pendaftaran }}</h3>

              <p>Pendaftaran</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-list-alt"></i>
            </div>
            <a href="{{ url('membership') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $anggota }}</h3>

              <p>Total Anggota</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="{{ url('membership') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $loan }}</h3>

              <p>Pengajuan Pembiayaan</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-eur"></i>
            </div>
            <a href="{{ url('financing') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $withdraw }}</h3>

              <p>Pengajuan Penarikan</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-usd"></i>
            </div>
            <a href="{{ url('withdraw') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-inbox"></i> Pembiayaan VS Simpanan</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              
            </div>
          </div>
          
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->

@endsection  