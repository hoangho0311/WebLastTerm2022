@extends('admin/MainAdmin')
@section('content')

<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
              
             <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Orders</p>
                          <h4 class="mb-0">{{$totalorder}}</h4>
                          <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>22.5% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                          <i class="bi bi-basket2"></i>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Income</p>
                          <h4 class="mb-0">{{$TotalIncome/100}}.000$</h4>
                          <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                          <i class="bi bi-currency-dollar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Views</p>
                          <h4 class="mb-0">875</h4>
                          <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>12.3% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                          <i class="bi bi-emoji-heart-eyes"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">New Clients</p>
                          <h4 class="mb-0">{{$totalnewUser}}3</h4>
                          <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>32.7% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-info text-white">
                          <i class="bi bi-people-fill"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>

             </div><!--end row-->

             
             <div class="row">
                <div class="col-12 col-lg-8 col-xl-8 d-flex">
                   <div class="card w-100 rounded-4">
                     <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Revenue History</h6>
                        <div class="fs-5 ms-auto dropdown">
                           <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                             <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">Action</a></li>
                               <li><a class="dropdown-item" href="#">Another action</a></li>
                               <li><hr class="dropdown-divider"></li>
                               <li><a class="dropdown-item" href="#">Something else here</a></li>
                             </ul>
                         </div>
                       </div>
                      <div class="d-flex align-items-center gap-3">
                        <div class="">
                          <h4 class="text-success mb-0">$9,279</h4>
                          <p class="mb-0">Revenue</p>
                        </div>
                        <div class="vr"></div>
                        <div class="">
                          <h4 class="text-pink mb-0">$5,629</h4>
                          <p class="mb-0">Investment</p>
                        </div>
                      </div>
                        <div id="chart1"></div>
                     </div>
                   </div>
                </div>
                <div class="col-12 col-lg-4 col-xl-4 d-flex">
                  <div class="card w-100 rounded-4">
                    <div class="card-body">
                     <div class="d-flex align-items-center mb-3">
                       <h6 class="mb-0">Task Overview</h6>
                       <div class="fs-5 ms-auto dropdown">
                          <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                      </div>
                       <div id="chart2"></div>
                    </div>
                    <ul class="list-group list-group-flush mb-0 shadow-none">
                      <li class="list-group-item bg-transparent border-top"><i class="bi bi-circle-fill me-2 font-weight-bold text-primary"></i> Complete <span class="float-end">{{$totalorder}}</span></li>
                      <li class="list-group-item bg-transparent"><i class="bi bi-circle-fill me-2 font-weight-bold text-orange"></i> In Progress <span class="float-end">8</span></li>
                    </ul>
                  </div>
               </div>

             </div><!--end row-->

             


        <div class="row">
           <div class="col-12 col-lg-6 col-xl-6 d-flex">
            <div class="card rounded-4 w-100">
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0">Customer Reviews</h6>
                  <div class="fs-5 ms-auto dropdown">
                     <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                       <ul class="dropdown-menu">
                         <li><a class="dropdown-item" href="#">Action</a></li>
                         <li><a class="dropdown-item" href="#">Another action</a></li>
                         <li><hr class="dropdown-divider"></li>
                         <li><a class="dropdown-item" href="#">Something else here</a></li>
                       </ul>
                   </div>
                 </div>
              </div>
               <div class="card-body">
                 <div class="review-list">
                  @foreach($comment as $row)
                  @foreach($commentuser as $data)
                  @if($row->iduser == $data->id)
                  <div class="d-flex align-items-start">
                    <div class="review-user">
                      <img src="{{ asset('/image/user_image/' . $data->image) }}" width="65" height="65" class="rounded-circle" alt="">
                    </div>
                    <div class="review-content ms-3">
                      
                      <div class="d-flex align-items-center mb-2">
                        <h6 class="mb-0">{{$data->name}}</h6>
                        <p class="mb-0 ms-auto">{{$row->created_at}}</p>
                      </div>
                      <p>{!!$row->content!!}</p>
                    </div>
                  </div>
                  <hr>
                  @endif
                  @endforeach
                  @endforeach
                </div>
               </div>
            </div>
           </div>
           <div class="col-12 col-lg-6 col-xl-6 d-flex">
            <div class="card rounded-4 w-100">
               <div class="card-body">
                 <div class="d-flex align-items-center mb-3">
                   <h6 class="mb-0">Top Selling Products</h6>
                   <div class="fs-5 ms-auto dropdown">
                      <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                  </div>
                  <div class="">
                   
                   <hr>
                   @foreach($topsellcar as $top)
                   <div class="d-flex align-items-start gap-3">
                    <div class="product-box border">
                      <img src="{{ asset('/image/cars/' . $top->image) }}" alt="product img">
                    </div>
                    <div class="flex-grow-1">
                      <div class="progress-wrapper">
                        <p class="my-2">{{$top->name}}<span class="float-end">({{$top->inOrder}} Orders)</span></p>
                        <div class="progress" style="height: 4px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 32%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                   @endforeach
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
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="/assets/js/pace.min.js"></script>

   <!-- Vector map JavaScript -->
   <script src="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
   <script src="/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!--app-->
  <script src="/assets/js/app.js"></script>
  <script src="/assets/js/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")
 </script>
  <script>
    // chart 2 
   var user = {!! json_encode($user->toArray()) !!};
    var total = {!! json_encode($totalorder) !!};
    
    var options = {
            chart: {
                height: 300,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                  //startAngle: -135,
                  //endAngle: 135,
                  hollow: {
                      margin: 0,
                      size: '45%',
                      background: 'transparent',
                      image: undefined,
                      imageOffsetX: 0,
                      imageOffsetY: 0,
                      position: 'front',
                      dropShadow: {
                        enabled: false,
                        top: 3,
                        left: 0,
                        blur: 4,
                        opacity: 0.24
                      }
                    },
                    track: {
                      background: '#eeedfb',
                      strokeWidth: '50%',
                      margin: 12, // margin is in pixels
                      dropShadow: {
                        enabled: false,
                        top: -3,
                        left: 0,
                        blur: 4,
                        opacity: 0.35
                      }
                    },
                    dataLabels: {
                        name: {
                            color:'#000',
                            fontSize: '14px',
                            offsetY: -5
                        },
                        value: {
                            color: '#000',
                            fontSize: '25px',
                            offsetY: 5
                        },
                        total: {
                            show: true,
                            label: 'Total Order',
                            color: '#000',
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return total
                            }
                        }
                    }
                }
            },
            stroke: {
               lineCap: "butt",
           },
            colors: ["#8932ff", "#ff6632"],
            series: [total, 8],
            labels: ['Complete', 'In Progress'],
            responsive: [{
                      breakpoint: 1280,
                      options: {
                          chart: {
                              height: 350
                          }
                      }
                  }]
            
        }

       var chart = new ApexCharts(
            document.querySelector("#chart2"),
            options
        );
        
        chart.render();
	
  </script>
  <script>
  var totalIncome = {!! json_encode($TotalIncome) !!};

	var options = {
            chart: {
                height: 350,
                type: 'area',
                stacked: false,
                foreColor: '#4e4e4e',
                toolbar: {
                      show: false
                    },
                dropShadow: {
                    enabled: false,
                    opacity: 0.1,
                    blur: 3,
                    left: -7,
                    top: 22,
                }
            },
            plotOptions: {
                bar: {
            columnWidth: '30%',
              endingShape: 'rounded',
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                }
            },
            dataLabels: {
                enabled: false,
                formatter: function(val) {
                  return parseInt(val);
                },
                offsetY: -20,
                style: {
                    fontSize: '14px',
                    colors: ["#304758"]
                }
            },
            stroke: {
                show: true,
                width: [4, 4],
                dashArray: [0, 3],
                curve: 'smooth'
               // colors: ['transparent']
            },
            grid:{
                show: true,
                borderColor: 'rgba(0, 0, 0, 0.10)',
            },
            series: [{
                name: 'Revenue',
				type: 'area',
                data: [50, 80, 37, 70, 41, 98, 53, 40, 66, 75, 55, totalIncome]
            },{
                name: 'Investment',
				type: 'line',
                data: [70, 91, 40, 75, 50, 120, 59, 53, 81, 100, 80, 905]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            colors: ["#02ba5a", '#e72e7a'],
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: function (val) {
                        return " " + val + "$"
                    }
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                     height: 330,
                     stacked: true,
                          },
                legend: {
                  show: !0,
                  position: "bottom",
                  horizontalAlign: "center",
                  offsetX: -20,
                  fontSize: "10px",
                  markers: {
                    radius: 50,
                    width: 10,
                    height: 10
                  }
                  },
                  plotOptions: {
                  bar: {
                    columnWidth: '30%'
                    }
                  }
                      }
                  }]
        }

        var chart = new ApexCharts(
            document.querySelector("#chart1"),
            options
        );

        chart.render();
		
  </script>
</body>

</html>

@endsection('content')