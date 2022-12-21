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
    
       <!--end page main-->
       <main class="page-content">
          <div class="row">
             <div class="d-flex">
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
                     <table class="table align-middle">
                       <thead class="table-light">
                         <tr>
                           <th>ID</th>
                           <th>Customer name</th>
                           <th>Email</th>
                           <th>Google_id</th>
                           <th>Date</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody class="default_data">
                        @foreach($users as $user)
                        @foreach($infor as $data)
                        @if($data->iduser == $user->email)
                         <tr>
                           <td>{{$user->id}}</td>
                           <td>{{$data->fname}} {{$data->lname}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->google_id}}</td>
                           <td>{{$user->created_at}}</td>
                           <td>
                            <div class="d-flex align-items-center gap-3 fs-6">
                              <a class="text-primary"  data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                              <a class="text-warning" href="#edit{{$user->id}}" data-bs-toggle="modal" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                              <a class="text-danger" href="#delete{{$user->id}}" data-bs-toggle="modal" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                              @include('action/usermanager/action')
                            </div>
                           </td>
                         </tr>
                        @endif
                        @endforeach
                        @endforeach

                       </tbody>
                       <tbody class="search_data"></tbody>
                     </table>
                   </div>
                   {{ $users->links() }}
                 </div>
               </div>
             </div>
            
          </div><!--end row-->
      </main>
      
       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script>

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
                url:"{{ URL::to('searchUser') }}",
                method:'GET',
                data:{'data':$value}, 
                success:function(data)
                {
                    $('.search_data').html(data);
                }
            })
        });

  </script>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
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