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
  <link rel="stylesheet" href="/assets/plugins/notifications/css/lobibox.min.css" />
  <link href="/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="/assets/css/style.css" rel="stylesheet" />
  <link href="/assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="/assets/css/pace.min.css" rel="stylesheet" />


  <title>Bookcar - Dashboard</title>
</head>

<body>
    <div class="section detail_car">
        <div class="vehicle-images">
            <img class="tab-vehicle active" src="/image/cars/61fc157680bcb6000427ccff.png">
            
            <img class="tab-vehicle " src="/image/cars/models.png">
            
            <img class="tab-vehicle " src="/image/cars/tesla-model-3-2020.png">
        </div>
            <div class="test-drive-form">
            <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  
                  <form class="row g-3" action="{{url('/sendEmail')}}">
                    <div class="form_dtl">
                        <h6 class="mb-0 text-uppercase">SIGN UP FOR A TEST DRIVE</h6>
                        <hr/>
                        <div class="row  g-3">
                            <div class="col-12">
                            <label class="form-label">CAR MODEL SELECTION</label>
                            <select class="form-select" id="validationCustom04" name="product" required>
                                {{-- <option selected disabled value="">Choose...</option> --}}
                                <option>Model X</option>
                                <option>Model Y</option>
                                <option>Model Z</option>
                            </select>
                            </div>
                            <div class="col-6">
                            <label class="form-label">LOCATION</label>
                            <input type="text" class="form-control" required>
                            </div>
                            <div class="col-6">
                            <label class="form-label">SHOWROOM</label>
                            <input type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                            <label class="form-label">ADDRESS</label>
                            <input type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                            <label class="form-label">EMAIL</label>
                            <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                            <label class="form-label">PHONE</label>
                            <input type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                            <label class="form-label">ADDITIONAL INFORMATION</label>
                            <textarea class="form-control" rows="4" cols="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" onclick="success_noti()">TEST DRIVE</button>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check d-flex justify-content-center gap-2">
                          <input class="form-check-input" type="checkbox" id="gridCheck3-c" checked>
                          <label class="acceptRegister" for="gridCheck3-c">
                            Register to receive information about promotions and services from BookCar
                          </label>
                        </div>
                    </div>
                    <hr class="dropdown-divider">
                    <p class="hotline">If you have any questions, please contact - HOTLINE -</p>
                  </form>
                </div>
                </div>
              </div>
        </div>

    </div>

    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--notification js -->
    <script src="/assets/plugins/notifications/js/lobibox.min.js"></script>
    <script src="/assets/plugins/notifications/js/notifications.min.js"></script>
    <script src="/assets/plugins/notifications/js/notification-custom-script.js"></script>
    <script src="/assets/js/pace.min.js"></script>
    <!--app-->
    <script src="/assets/js/app.js"></script>

   <!-- Vector map JavaScript -->
  <script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")
 </script>


</body>

</html>
@endsection('content')