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
        <div class="card">
          <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-3 col-xl-2">
                                    <a href="{{route('insertProduct')}}" class="btn btn-primary mb-3 mb-lg-0"><i class="bi bi-plus-square-fill me-2"></i>Add Product</a>
                                </div>
                                <div class="col-lg-9 col-xl-10">
                                    
                                </div>
                            </div>
                        </div>
        </div>

          <div class="card">
             <div class="card-header py-3"> 
              <div class="row g-3 align-items-center">
                <div class="col-lg-3 col-md-6 me-auto">
                  <div class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                    <input class="form-control ps-5" name="search" id="search" type="text" placeholder="search produts">
                  </div>
                </div>
                <div class="col-lg-2 col-md-3">
                  <div class="ms-auto position-relative">
                    <label for="customRange" class="">Custom Price</label>
                    <input type="range" class="form-range" step="10" id="slider" value="50000" min="0.0" max="200000" name="points">
                    <br/>
                    <span id="slider_value">$50000</span>
                  </div>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                  <select class="form-select" id="choose_type">
                    <option>All</option>
                    <option>Electric</option>
                    <option>Gasoline</option>
                  </select>
                </div>
              </div>
             </div>
             <div class="card-body">
               <div class="product-grid">
                 <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3 all_data"> 
                    @foreach($product as $row)
                   
                    <div class="col">
                        <div class="card border shadow-none mb-0">
                        <div class="card-body text-center">
                            <img src="{{asset('/image/cars/' . $row->image) }}" class="img-fluid mb-3" alt=""/>
                            <h6 class="product-title">{{$row->name}}</h6>
                            <input class="id_product" type="text" value="{{$row->id}}" hidden>
                            <p class="product-price fs-5 mb-1"><span>{{$row->price}}$</span></p>
                            <small>Quantity {{$row->quantity}}</small>
                              <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                              <a href="{{url('editProduct',$row->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-fill"></i>Edit</a>
                              <a class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</a>
                              </div>
                        </div>
                        </div>
                    </div>
                    
                    @endforeach
                </div><!--end row-->
                <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3 search_data"> 
                </div>
            </div>
        </div>
        
          <div class="popup_box">
              <i class="fas fa-exclamation"></i>
              <h1>Your account will be deleted Permanently!</h1>
              <p id="idxoa">xx</p>
              <label>Are you sure to proceed?</label>
              <div class="btns">
                <a href="#" class="btn1">Cancel Process</a>
                <a href="#" class="btn2"><button class="delete_product_btn" type="submit" name="" id="">Delete Account</button></a>
              </div>
          </div>
</div>   
</div>  
<div id="LoadUserControl" style="overflow-y:auto; overflow-x:hidden; "></div>
</main>
       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->

       <!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  {{-- Search Price --}}
  <script>
    $(document).on('input', '#slider', function() {
        $value = $(this).val();
        if($value > 100){
            $('.all_data').hide();
            $('.search_data').show();
          }else{
            $('.all_data').show();
            $('.search_data').hide();
        }
        $('#slider_value').html("$" + $(this).val());
        $.ajax({
            url:"{{ route('search.products') }}",
            method:"GET",
            data:{'data':$value},
            success:function(res){
              $('.search_data').html(res);
          }
      });
    });

  </script>

  {{--  --}}
  <script>
      $('#search').on('keyup', function(){
            $value = $(this).val();

            if($value){
              $('.all_data').hide();
              $('.search_data').show();
            }else{
              $('.all_data').show();
              $('.search_data').hide();
            }

            $.ajax({
                url:"{{ URL::to('action') }}",
                method:'GET',
                data:{'data':$value}, 
                success:function(data)
                {
                    $('.search_data').html(data);
                }
            })
        });
  </script>

  <script>
      $(document).ready(function() {
        $("#choose_type").change(function(){
                if($('#choose_type').val() == "Electric"){
                  $('.all_data').hide();
                  $('.search_data').show();
                }else if($('#choose_type').val() == "Gasoline"){
                  $('.all_data').hide();
                  $('.search_data').show();
                }else{
                  $('.all_data').show();
                  $('.search_data').hide();
                }
            $.ajax({
                url:"{{ URL::to('choose_type_car') }}",
                method:'GET',
                data:{'data':$('#choose_type').val()}, 
                success:function(data)
                {
                    $('.search_data').html(data);
                }
            });
        });
    });
  </script>
  {{-- Delete Produtct --}}
    <script>
       function delete_product(id)
        {
            $.ajax({
                url:"{{ route('deletecar') }}",
                method:'get',
                data:{query:id},
                success:function(data)
                {
                  window.location.reload();
                }
            })
        }

      const tabs_deletebtn = document.querySelectorAll(".btn-outline-danger");
      tabs_deletebtn.forEach((tab, index) => {
        tabs_deletebtn[index].onclick = function (){
          document.getElementById("idxoa").innerHTML = $(this).closest(".text-center").find('.id_product').val();
        }
      });

      $(document).ready(function(){
        $('.btn-outline-danger').click(function(){
          $('.popup_box').css("display", "block");
        });

        $('.btn1').click(function(){
          $('.popup_box').css("display", "none");
        });
        $('.btn2').click(function(){
          $('.popup_box').css("display", "none");
          delete_product(document.getElementById("idxoa").innerHTML);
        });
      });

    </script>
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