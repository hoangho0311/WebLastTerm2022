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
    <main class="page-content">
            
        <!--end breadcrumb-->

          <div class="card">
            <div class="card-header py-3">
              <div class="row g-3">
                <div class="col-lg-3 col-md-6 me-auto">
                  <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" type="text" placeholder="Search">
                  </div>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                  <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                  </select>
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
               <div class="table-responsive">
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                      <tr>
                        <th>#ID</th>
                        <th>Customer Name</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Visible</th>
                        <th>Reply Comment</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($comments as $datacomments)
                      @foreach($user as $datauser)
                      @if($datauser->id == $datacomments->iduser)
                      @foreach($infor as $datainfor)
                      @if($datainfor->iduser == $datauser->email)
                      <tr>
                        <td>{{$datacomments->id}}</td>
                        <td>
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                             <img src="{{ asset('/image/user_image/' . $datauser->image) }}" class="rounded-circle" width="44" height="44" alt="">
                             <div class="">
                               <p class="mb-0">{{$datauser->name}}</p>
                             </div>
                          </div>
                        </td>
                        <td>{!!$datacomments->content!!}</td>
                        <td>{{$datacomments->created_at}}</td>
                        @if($datacomments->visible == "true")
                        <td>
                          <a href="{{route("changeCMVisible", $datacomments->id)}}" class="text-primary" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                        </td>
                        @else
                        <td>
                          <a href="{{route("changeCMVisible", $datacomments->id)}}" class="text-primary" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="fa-solid fa-eye-slash"></i></a>
                        </td>
                        @endif
                        <td><a href="#viewReply{{$datacomments->id}}" data-bs-toggle="modal" id="view_reply">View</a></td>
                        <td>
                          <div class="d-flex align-items-center gap-3 fs-6">
                            <a href="#edit{{$datacomments->id}}" data-bs-toggle="modal" class="text-warning" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                            <a href="#delete{{$datacomments->id}}" data-bs-toggle="modal" class="text-danger" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                            @include('action/usermanager/actionComment')
                          </div>
                        </td>
                       
                      </tr>
                      @endif
                      @endforeach
                      @endif
                      @endforeach
                      @endforeach
                      
                    </tbody>
                  </table>
                  {{$comments->links()}}
               </div>
            </div>
          </div>

      </main>
      
       <!--start overlay-->
      <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

      

  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  
  <!--plugins-->
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