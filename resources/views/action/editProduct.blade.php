@extends('admin/MainAdmin')

@section('content')
<!doctype html>
<html lang="en" class="semi-dark">

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
   
          <main class="page-content">    
           <a class="" href="{{route('managerProduct')}}"><i class="fa-solid fa-arrow-left-long"></i></a>

              <div class="row">
                
                <form method="POST" action="{{url('updateProduct', $data->id)}}" enctype="multipart/form-data">
                @csrf
                @if($data != null)
                 <div class="col-lg-12 mx-auto">
                  <div class="card">
                    <div class="card-header py-3 bg-transparent"> 
                      <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">Edit Product</h5>
                        <div class="ms-auto">
                          <button type="button" class="btn btn-secondary">Save to Draft</button>
                          <button type="submit" class="btn btn-primary">Publish Now</button>
                        </div>
                      </div>
                     </div>
                    <div class="card-body">
                       <div class="row g-3">
                         <div class="col-12 col-lg-8">
                            <div class="card shadow-none bg-light border">
                              <div class="card-body">
                                <form class="row g-3">
                                  <div class="col-12">
                                    <label class="form-label">Product name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product title" value="{{$data->name}}">
                                  </div>
                                  
                                  <div class="col-12 col-lg-4">
                                    <label class="form-label">Color</label>
                                    <input type="text" name="color" class="form-control" placeholder="Color" value="{{$data->color}}">
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <label class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Price" value="{{$data->price}}">
                                  </div>
                                  <div class="col-12">
                                    <label class="form-label">Fuel</label>
                                    <input type="text" name="fuel" class="form-control" placeholder="Fuel" value="{{$data->fuel}}">
                                  </div>
                                  <div class="col-12 col-lg-4">
                                    <label class="form-label">Power</label>
                                    <input type="text" name="power" class="form-control" placeholder="Power" value="{{$data->power}}">
                                  </div>
                                  <div class="col-12">
                                    <label class="form-label">Full description</label>
                                    <textarea class="form-control" placeholder="Full description" rows="4" cols="4"></textarea>
                                  </div>
                                </form>
                              </div>
                            </div>
                         </div>

                         <div class="col-12 col-lg-4">
                            <div class="card shadow-none bg-light border">
                              <div class="card-body">
                                  <div class="row g-3">
                                    <div class="col-12 result-photo">
                                      <img src="{{ asset('/image/cars/' . $data->image) }}">
                                    </div>
                                    <div class="col-12">
                                      <label class="form-label">Images</label>
                                      <input type="text" name="hidden_image" value="{{$data->image}}">
                                      <input type="text" name="id_hidden" value="{{$data->id}}" hidden>

                                      <input class="form-control" name="image" type="file">
                                    </div>
                                    <div class="col-12">
                                      <label class="form-label">Quantity</label>
                                      <input type="text" name="quantity" class="form-control" placeholder="quantity" value="{{$data->quantity}}">
                                    </div>
                                    <div class="col-12">
                                      <label class="form-label">Type</label>
                                      <select name="type" class="form-select">
                                        <option>Electric</option>
                                        <option>Gasoline</option>
                                      </select>
                                    </div>
                                   
                                    
                                  </div><!--end row-->
                              </div>
                            </div>  
                        </div>

                       </div><!--end row-->
                     </div>
                    </div>
                 </div>
                @endif
                 
                </form>
              </div>
          </main>
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
        <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
        <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
        <script src="/assets/js/pace.min.js"></script>
        <script>
          new PerfectScrollbar(".review-list")
          new PerfectScrollbar(".chat-talk")
       </script>
  

</body>

</html>
@endsection('content')