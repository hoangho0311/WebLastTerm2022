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
    <main class="page-content">
     
      <div class="profile-cover bg-dark"></div>

      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="card shadow-sm border-0">
            <input type="hidden" class="form-control" name="name" value="{{$user->id}}">
            <form method="POST" action="{{url('updateProfile', $user->email)}}" >
            @csrf
            <div class="card-body">
                <h5 class="mb-0">My Account</h5>
                <hr>
                <div class="card shadow-none border">
                  <div class="card-header">
                    <h6 class="mb-0">USER INFORMATION</h6>
                  </div>
                  <div class="card-body">
                    <form class="row g-3">
                      <div class="col-6">
                        <label class="form-label">Avatar</label><br>
                        <input class="file-input" type="file" name="image" >
                     </div>
                       <div class="col-6">
                          <label class="form-label">Username</label>
                          <input type="text" class="form-control" name="name" value="{{$user->name}}">
                       </div>
                       <div class="col-6">
                        <label class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                      </div>
                        <div class="col-6">
                          <label class="form-label">First Name</label>
                          <input type="text" class="form-control" name="fname" value="{{$profile->fname}}">
                      </div>
                      <div class="col-6">
                          <label class="form-label">Last Name</label>
                          <input type="text" class="form-control" name="lname" value="{{$profile->lname}}">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card shadow-none border">
                  <div class="card-header">
                    <h6 class="mb-0">CONTACT INFORMATION</h6>
                  </div>
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-12">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{$profile->address}}">
                       </div>
                       <div class="col-6">
                          <label class="form-label">City</label>
                          <input type="text" class="form-control" name="city" value="{{$profile->city}}">
                       </div>
                       <div class="col-6">
                        <label class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" value="{{$profile->country}}">
                      </div>
                        <div class="col-6">
                          <label class="form-label">Pin Code</label>
                          <input type="text" class="form-control" value="jhon">
                      </div>
                      
                      <div class="col-12">
                        <label class="form-label">About Me</label>
                        <textarea class="form-control" rows="4" cols="4" name="description">{{$profile->description}}</textarea>
                       </div>
                      </div>
                  </div>
                </div>
                <div class="text-start">
                  <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>
            </div>
          </form>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
                <div class="profile-avatar text-center">
                  <img src="{{ asset('/image/user_image/' . $user->image) }}" class="rounded-circle shadow" width="120" height="120" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-around mt-5 gap-3">
                    <div class="text-center">
                      <h4 class="mb-0">45</h4>
                      <p class="mb-0 text-secondary">Friends</p>
                    </div>
                    <div class="text-center">
                      <h4 class="mb-0">15</h4>
                      <p class="mb-0 text-secondary">Photos</p>
                    </div>
                    <div class="text-center">
                      <h4 class="mb-0">86</h4>
                      <p class="mb-0 text-secondary">Comments</p>
                    </div>
                </div>
                <div class="text-center mt-4">
                  <h4 class="mb-1">{{$user->name}}</h4>
                  <p class="mb-0 text-secondary">{{$profile->city}}</p>
                  <div class="mt-4"></div>
                  <h6 class="mb-1">HR Manager - Codervent Technology</h6>
                  <p class="mb-0 text-secondary">University of Information Technology</p>
                </div>
                <hr>
                <div class="text-start">
                  <h5 class="">About</h5>
                  <p class="mb-0">{{$profile->description}}</p>
                </div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                Followers
                <span class="badge bg-primary rounded-pill">95</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                Following
                <span class="badge bg-primary rounded-pill">75</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                Templates
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
            </ul>
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
  <script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")
 </script>


</body>

</html>


@endsection('content')