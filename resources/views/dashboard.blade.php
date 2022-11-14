@extends('main')
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
    @if($user->access == "user")
    @if($currentcars->count() > 0)
    <div class="section analyst">
			<div class="asset1">
				<div class="box_asset">
					<img class="dashboard_car_img" src="/image/product/car3.jfif">
				</div>
			</div>
      <div class="analys_dashboard">
        <div class="chart" id="chart">
          <h3 class="title">Activity</h3>
        </div>
      </div>
		</div>
    <div class="section asset2">
      <div class="noites-tab noties">
        <h3 class="title">Noties</h3>
        <div class="notie">
          <i class="ri-chat-1-line"></i>
          <div class="notie-text">
            <h4>Monday, 6th</h4>
            <p>Book for Service</p>
          </div>
        </div>
        <div class="notie">
          <i class="ri-chat-1-line"></i>
          <div class="notie-text">
            <h4>Monday, 6th</h4>
            <p>Book for Service</p>
          </div>
        </div>
      </div>
      <div class="noites-tab sensors">
        <h3 class="title">Asset</h3>
      </div>
  </div>
  <div class="reminder">
    <h3 class="title">Reminder</h3>
    <table>
      <tr>
        <th>Description</th>
        <th>Due</th>
        <th>Overdue</th>
        <th>Notify</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
      </tr>
      <tr>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
        <td>abcdr</td>
      </tr>
    </table>
  </div>
  @else
  <div class="center_tab">
    <p>You need buy car to see this</p>
    <a href="{{ route("sellcar") }}">Click Here</a>
  </div>
  @endif
  @elseif($user->access == "admin")
       <!--start content-->
          <main class="page-content">
              
             <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Orders</p>
                          <h4 class="mb-0">5.8K</h4>
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
                          <h4 class="mb-0">$9,786</h4>
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
                          <h4 class="mb-0">9853</h4>
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
                      <li class="list-group-item bg-transparent border-top"><i class="bi bi-circle-fill me-2 font-weight-bold text-primary"></i> Complete <span class="float-end">120</span></li>
                      <li class="list-group-item bg-transparent"><i class="bi bi-circle-fill me-2 font-weight-bold text-orange"></i> In Progress <span class="float-end">110</span></li>
                      <li class="list-group-item bg-transparent"><i class="bi bi-circle-fill me-2 font-weight-bold text-info"></i> Started <span class="float-end">70</span></li>
                    </ul>
                  </div>
               </div>

             </div><!--end row-->

             <div class="row row-cols-1 row-cols-lg-4 radial-charts g-4">
               <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="text-center">
                        <p class="mb-1">Orders</p>
                        <h4 class="">9,254</h4>
                      </div>
                       <div class="">
                          <div id="chart3"></div>
                       </div>
                      <div class="text-center">
                        <p class="mb-1">Completed</p>
                        <h4 class="">5632</h4>
                      </div>
                    </div>
                  </div>
               </div>
               <div class="col">
                <div class="card rounded-4">
                  <div class="card-body">
                    <div class="text-center">
                      <p class="mb-1">Unique Visitors</p>
                      <h4 class="">5,2684</h4>
                    </div>
                     <div class="">
                        <div id="chart4"></div>
                     </div>
                    <div class="text-center">
                      <p class="mb-1">Increased since Last Week</p>
                      <h4 class="">25%</h4>
                    </div>
                  </div>
                </div>
             </div>
             <div class="col">
              <div class="card rounded-4">
                <div class="card-body">
                  <div class="text-center">
                    <p class="mb-1">Impressions</p>
                    <h4 class="">7,362</h4>
                  </div>
                   <div class="">
                      <div id="chart5"></div>
                   </div>
                  <div class="text-center">
                    <p class="mb-1">Increased since Last Week</p>
                    <h4 class="">45%</h4>
                  </div>
                </div>
              </div>
           </div>
           <div class="col">
            <div class="card rounded-4">
              <div class="card-body">
                <div class="text-center">
                  <p class="mb-1">Followers</p>
                  <h4 class="">4278K</h4>
                </div>
                 <div class="">
                    <div id="chart6"></div>
                 </div>
                <div class="text-center">
                  <p class="mb-1">Increased since Last Week</p>
                  <h4 class="">55%</h4>
                </div>
              </div>
            </div>
          </div>

        </div><!--end row-->


        <div class="row">
           <div class="col-12 col-lg-6 col-xl-6 d-flex">
             <div class="card rounded-4 w-100">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <h6 class="mb-0">Sales By Countries</h6>
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
                   <div id="world-map" style="height: 242px;"></div>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center">
                  <tbody>
                    <tr>
                   <td><i class="flag-icon flag-icon-gb"></i></td>
                   <td><i class="bi bi-circle-fill me-2 text-primary"></i> Russia</td>
                   <td><p class="mb-0">Sales: <span class="fw-bold">28,000</span></p></td>
                   <td>40%</td>
                   </tr>
                    <tr>
                   <td><i class="flag-icon flag-icon-au"></i></td>
                   <td><i class="bi bi-circle-fill me-2 text-warning"></i> Australia</td>
                   <td><p class="mb-0">Sales: <span class="fw-bold">58,000</span></p></td>
                   <td>60%</td>
                   </tr>
                    <tr>
                   <td><i class="flag-icon flag-icon-us"></i></td>
                   <td><i class="bi bi-circle-fill me-2 text-success"></i> United States</td>
                   <td><p class="mb-0">Sales: <span class="fw-bold">72,000</span></p></td>
                   <td>30%</td>
                   </tr>
                    <tr>
                   <td><i class="flag-icon flag-icon-in"></i></td>
                   <td><i class="bi bi-circle-fill me-2 text-secondary"></i> India</td>
                   <td><p class="mb-0">Sales: <span class="fw-bold">68,000</span></p></td>
                   <td>55%</td>
                   </tr>
                  </tbody>
                  </table>
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
                    <div class="d-flex align-items-start gap-3">
                      <div class="product-box border">
                        <img src="/assets/images/products/05.png" alt="product img">
                      </div>
                      <div class="flex-grow-1">
                        <div class="progress-wrapper">
                          <p class="my-2">iPhone 11 - A24512 <span class="float-end">(4,216 Orders) <span class="ms-3 fw-bold">42%</span></span></p>
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 42%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <hr>
                   <div class="d-flex align-items-start gap-3">
                      <div class="product-box border">
                        <img src="/assets/images/products/07.png" alt="product img">
                      </div>
                      <div class="flex-grow-1">
                        <div class="progress-wrapper">
                          <p class="my-2">iPhone 11 - A24512 <span class="float-end">(4,216 Orders) <span class="ms-3 fw-bold">42%</span></span></p>
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 42%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <hr>
                    <div class="d-flex align-items-start gap-3">
                      <div class="product-box border">
                        <img src="/assets/images/products/09.png" alt="product img">
                      </div>
                      <div class="flex-grow-1">
                        <div class="progress-wrapper">
                          <p class="my-2">iPhone 11 - A24512 <span class="float-end">(4,216 Orders) <span class="ms-3 fw-bold">42%</span></span></p>
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 42%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <hr>
                  <div class="d-flex align-items-start gap-3">
                      <div class="product-box border">
                        <img src="/assets/images/products/02.png" alt="product img">
                      </div>
                      <div class="flex-grow-1">
                        <div class="progress-wrapper">
                          <p class="my-2">iPhone 11 - A24512 <span class="float-end">(4,216 Orders) <span class="ms-3 fw-bold">42%</span></span></p>
                          <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 42%"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   <hr>
                   <div class="d-flex align-items-start gap-3">
                    <div class="product-box border">
                      <img src="/assets/images/products/04.png" alt="product img">
                    </div>
                    <div class="flex-grow-1">
                      <div class="progress-wrapper">
                        <p class="my-2">iPhone 11 - A24512 <span class="float-end">(4,216 Orders) <span class="ms-3 fw-bold">42%</span></span></p>
                        <div class="progress" style="height: 4px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 42%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                   </div>
               </div>
            </div>
          </div>

        </div><!--end row-->

        <div class="row row-cols-1 row-cols-lg-3">
          <div class="col">
            <div class="card rounded-4">
              <div class="card-body">
                 <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="">
                    <h4 class="mb-0">24.5K</h4>
                    <p class="mb-0">Facebook Followers</p>
                 </div>
                 <div class="fs-2 text-facebook">
                  <i class="bi bi-facebook"></i>
                </div>
                 </div>
                 <div id="chart7"></div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-4">
              <div class="card-body">
                 <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="">
                    <h4 class="mb-0">37.8K</h4>
                    <p class="mb-0">Twitter Followers</p>
                 </div>
                 <div class="fs-2 text-twitter">
                  <i class="bi bi-twitter"></i>
                </div>
                 </div>
                 <div id="chart8"></div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-4">
              <div class="card-body">
                 <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="">
                    <h4 class="mb-0">56.9K</h4>
                    <p class="mb-0">Youtube Subscribers</p>
                 </div>
                 <div class="fs-2 text-youtube">
                  <i class="bi bi-youtube"></i>
                </div>
                 </div>
                 <div id="chart9"></div>
              </div>
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
                      <div class="rates cursor-pointer fs-6">
                        <i class="bx bxs-star text-warning"></i>
                        <i class="bx bxs-star text-warning"></i>
                        <i class="bx bxs-star text-warning"></i>
                        <i class="bx bxs-star text-warning"></i>
                        <i class="bx bxs-star text-warning"></i>
                      </div>
                      <div class="d-flex align-items-center mb-2">
                        <h6 class="mb-0">{{$data->name}}</h6>
                        <p class="mb-0 ms-auto">{{$row->created_at}}</p>
                      </div>
                      <p>{{$row->content}}</p>
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
              <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0">Chat Box</h6>
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
               <div class="card-body p-0">
                  <div class="chat-talk d-flex flex-column gap-4 p-3">
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3">
                         Hello , Codervent
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3 bg-light">
                         Hello , Codervent
                      </div>
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3">
                         Hello , Codervent
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3 bg-light">
                         Hello , Codervent
                      </div>
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3">
                         Hello , Codervent
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3 bg-light">
                         Hello , Codervent
                      </div>
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3">
                         Hello , Codervent
                      </div>
                     </div>
                     <div class="d-flex align-items-end gap-3">
                      <div class="chat-msg border flex-grow-1 rounded-4 p-3 bg-light">
                         Hello , Codervent
                      </div>
                      <div class="chat-user">
                        <img src="/assets/images/avatars/avatar-7.png" width="55" height="55" class="rounded-circle" alt="">
                      </div>
                     </div>
                  </div>
                  <div class="card-footer bg-transparent">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Type your message">
                      <button class="btn btn-primary" type="button"><i class="bi bi-send"></i></button>
                    </div>
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

       <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->
       @endif
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="/assets/js/pace.min.js"></script>
  <script src="/assets/plugins/chartjs/js/Chart.min.js"></script>
  <script src="/assets/plugins/chartjs/js/Chart.extension.js"></script>
  <script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
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


</body>

</html>

@endsection('content')