@extends('dashboard.layouts.main')

@section('container')
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome Back {{ auth()->user()->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">My Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-signs-post"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Postingan</span>
                  <span class="info-box-number">
                    {{ $jmlpost }}
                    <small>Postingan</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">{{ $totalLikes }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Total Komentar</span>
                  <span class="info-box-number">{{ $totalComments }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-line"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Keaktifan</span>
                  <span class="info-box-number">{{ $activityPercentage  }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        <div class="row">
            <canvas class="" id="myChart"></canvas>
        </div>
    </div>
@endsection

@section('chart')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>

<script>
    // Ambil data dari PHP dan jadikan JSON
    var postTitles = {!! json_encode($postTitles) !!};
        var likeCounts = {!! json_encode($likeCounts) !!};
        var commentCounts = {!! json_encode($commentCounts) !!};
        
        // Buat chart menggunakan Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: postTitles, // gunakan postTitles sebagai label
                datasets: [
                    {
                        label: 'Likes',
                        data: likeCounts, // Data likes
                        backgroundColor: 'rgba(220, 35, 44, 0.2)',
                        borderColor: 'rgba(220, 35, 44, 0.7)',
                        borderWidth: 1
                    },
                    {
                        label: 'Comments',
                        data: commentCounts, // Data comments
                        backgroundColor: 'rgba(40, 167, 69, 0.2)',
                        borderColor: 'rgba(40, 167, 69, 0.7)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

</script>
@endsection


