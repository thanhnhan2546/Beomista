@extends('layouts.admin')
@section('main')
<form id="loc">
  @csrf
  <div class="row">

    <div class="col-md-2">
      <label for="ngaydau">Từ ngày<label>
          <input type="date" name="ngaydau" id="ngaydau">

    </div>
    <div class="col-md-2">
      <label for="ngaycuoi">Đến ngày<label>
          <input type="date" name="ngaycuoi" id="ngaycuoi">
    </div>
    <div class="col-md-2">
    <label for="sort"><label>
      <select class="form-control" name="sort" id="sort_dt">
       
        <option value="{{route('thongke.sort')}}?sort=tuan">Thống kê theo tuần</option>
        <option value="{{route('thongke.sort')}}?sort=thang">Thống kê theo tháng</option>
        <option value="{{route('thongke.sort')}}?sort=nam">Thống kê theo năm</option>
      </select>
    </div>
    
  </div>
  <input type="submit" class="btn btn-success btnLoc" value="Lọc">
  <p class="text-right" id="total"></p>
</form>

<div class="col-md-12" >
 
  <div id="myfirstchart" style="height: 250px;"></div>
</div>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$data['sp']}}</h3>

            <p>Tổng sản phẩm</p>
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
            <h3>{{$data['kho']}}<sup style="font-size: 20px"></sup></h3>

            <p>Tổng sản phẩm trong kho</p>
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
            <h3>{{$data['nv']}}</h3>

            <p>Tổng số nhân viên</p>
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
            <h3>{{$data['kh']}}</h3>

            <p>Tổng khách hàng</p>
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

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$data['lsp']}}</h3>

            <p>Tổng danh mục sản phẩm</p>
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
            <h3>{{$data['hd']}}<sup style="font-size: 20px"></sup></h3>

            <p>Tổng hóa đơn </p>
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
            <h3>{{$data['slban']}}</h3>

            <p>Tổng sản phẩm đã bán</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @if(session()->get('quyen')=='admin' )
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$data['tk']}}</h3>

            <p>Tổng tài khoản</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      @endif
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

<h3>Hóa đơn</h3>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$data['hd_n']}}</h3>

            <p>Hóa đơn trong ngày</p>
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
            <h3>{{$data['hd_n2']}}<sup style="font-size: 20px"></sup></h3>

            <p>Tổng hóa đơn trong 1 tuần </p>
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
            <h3>{{$data['hd_n3']}}</h3>

            <p>Tổng hóa đơn trong 1 tháng </p>
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
            <h3>{{$data['hd_n4']}}</h3>

            <p>Tổng hóa đơn trong 1 năm</p>
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

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>


@stop
@section('js')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {

    var chart = new Morris.Bar({
      element: 'myfirstchart',

      pasreTime: false,


      xkey: 'period',

      ykeys: ['total'],

      labels: ['Doanh thu'],

    });
    
    $('#loc').submit(function(ev) {


      ev.preventDefault();
      $.ajax({
        type: 'post',
        url: 'thongke/loc',
        dataType: 'json',
        data: {
          ngaydau: $('#ngaydau').val(),
          ngaycuoi: $('#ngaycuoi').val(),
        },
        success: function(data) {
          console.log(data);
          chart.setData(data);
          document.getElementById('total').innerHTML ='Tổng doanh thu: '+data[0]['subtotal'].toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    })
        }
      })
    })
    $('#sort_dt').on('change', function() {
      var url = $(this).val();

      if (url) {

        $.ajax({
          type: 'get',
          url: url,
          dataType: 'json',

          success: function(data) {
            console.log(data);
            chart.setData(data);
            document.getElementById('total').innerHTML ='Tổng doanh thu: '+data[0]['subtotal'].toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    })
          }
        })
      }
      return false;
    });
    $.ajax({
          type: 'get',
          url: 'http://localhost/beomista/admin/thongke/dt',
          dataType: 'json',

          success: function(data) {
            console.log(data);
            
            chart.setData(data);
           
            document.getElementById('total').innerHTML ='Tổng doanh thu: '+data[0]['subtotal'].toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    })
          }
        })
  })

  //   $(document).ready(function(){
  //     new Morris.Bar({
  //   // ID of the element in which to draw the chart.
  //   element: 'myfirstchart',
  //   // Chart data records -- each entry in this array corresponds to a point on
  //   // the chart.
  //   data: [
  //     { year: '2008', value: 20 ,Year: 5},
  //     { year: '2008', value: 10 ,Year: 8},
  //     { year: '2010', value: 5 ,Year: 9},
  //     { year: '2011', value: 5 ,Year: 10},
  //     { year: '2012', value: 20 ,Year: 15}
  //   ],
  //   // The name of the data record attribute that contains x-values.
  //   xkey: 'year',
  //   // A list of names of data record attributes that contain y-values.
  //   ykeys: ['value','Year'],
  //   // Labels for the ykeys -- will be displayed when you hover over the
  //   // chart.
  //   labels: ['Tổng','Year']
  // });
  //   })
</script>
@stop