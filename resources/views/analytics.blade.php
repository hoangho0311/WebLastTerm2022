@extends('admin/MainAdmin')
@section('content')

<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="/assets/css/style.css" rel="stylesheet" />
  <link href="/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="/assets/css/dark-theme.css" rel="stylesheet" />
  <link href="/assets/css/light-theme.css" rel="stylesheet" />
  <link href="/assets/css/semi-dark.css" rel="stylesheet" />
  <link href="/assets/css/header-colors.css" rel="stylesheet" />

  <title>Bookcar - Dashboard</title>
</head>

<body>
       <!--start content-->
	   <main class="page-content">

		  <div class="row">
			 <div class="col-12 col-lg-9 d-flex">
			   <div class="card w-100">
				<div class="card-header py-3">
				  <div class="row g-3">
					<div class="col-lg-4 col-md-6 me-auto">
					  <div class="ms-auto position-relative">
						<div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
							<input class="form-control ps-5" name="search" id="search" type="text" placeholder="search produts">
						</div>
					</div>
					
					<div class="col-lg-2 col-6 col-md-3">
					  <select class="form-select">
						<option>Show 10</option>
						<option>Show 30</option>
						<option>Show 50</option>
					  </select>
					</div>
				  </div>
				 </div>
				 <div class="card-body">
				   <div class="table-responsive default_data">
					 <table class="table align-middle">
					   <thead class="table-light">
						 <tr>
						   <th>ID</th>
						   <th>ID USER</th>
						   <th>ID PRODUCT</th>
						   <th>Amount</th>
						   <th>BankCode</th>
						   <th>OrderInfo</th>
						   <TH>TransactionStatus</TH>
						   <th>Created</th>
						   {{-- <th>Action</th> --}}
						 </tr>
					   </thead>
					   <tbody >
							@foreach($vnpay as $row)
							<tr>
							<td>{{$row->id}}</td>
							<td>{{$row->id_user}}</td>
							<td>{{$row->id_product}}</td>
							<td>{{$row->vnp_Amount}}$</td>
							<td>{{$row->vnp_BankCode}}</td>
							<td>{{$row->vnp_OrderInfo}}</td>
							<td>{{$row->vnp_TransactionStatus}}</td>
							<td>{{$row->created_at}}</td>
							{{-- <td>
								<div class="d-flex align-items-center gap-3 fs-6">
								<a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
								<a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
								<a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
								</div>
							</td> --}}
							</tr>
							@endforeach		
						<div class="search_data">

						</div>
						
					   </tbody>
					 </table>
				   </div>
				   <div class="table-responsive search_data">
					<table class="table align-middle">
					  <thead class="table-light">
						<tr>
						  <th>ID</th>
						  <th>ID USER</th>
						  <th>ID PRODUCT</th>
						  <th>Amount</th>
						  <th>BankCode</th>
						  <th>OrderInfo</th>
						  <TH>TransactionStatus</TH>
						  <th>Created</th>
						  {{-- <th>Action</th> --}}
						</tr>
					  </thead>
					  <tbody class="data_search">
					
					   
					  </tbody>
					</table>
				  </div>
				 </div>
			   </div>
			 </div>
			 <div class="col-12 col-lg-3 d-flex">
			  <div class="card w-100">
				<div class="card-body">
					<div id="chart">
					</div>
				</div>
			  </div>
			</div>
		  </div><!--end row-->
		  

	  	</main>
   		<!--end page main-->

       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->
          <div class="ccsa"></div>
       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script>
	 $('.search_data').hide();

    $('#search').on('keyup', function(){
            $value = $(this).val();
			
            if($value){
              $('.default_data').hide();
              $('.search_data').show();
            }else{
              $('.default_data').show();
              $('.search_data').hide();
            }

            $.ajax({
                url:"{{ URL::to('searchPay') }}",
                method:'GET',
                data:{'data':$value}, 
                success:function(data)
                {
                    $('.data_search').html(data);
                }
            })
        });

  </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
	 var total = {!! json_encode($total) !!};
	 var options = {
          series: [total],
          chart: {
          height: 290,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '10%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            }
          }
        },
        colors: ['#1ab7ea'],
        labels: ['Total'],
        legend: {
          show: true,
          floating: true,
          fontSize: '10px',
          position: 'right',
          offsetX: 100,
          offsetY: 60,
          labels: {
            useSeriesColors: true,
          },
          markers: {
            size: 0
          },
          formatter: function(seriesName, opts) {
            return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex] + "$"
          },
          itemMargin: {
            vertical: 3
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
                show: false
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
  </script>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="/assets/js/pace.min.js"></script>

  <!--app-->
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")
 </script>
 
</body>

</html>

@endsection('content')