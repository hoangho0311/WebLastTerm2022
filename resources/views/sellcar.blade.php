@extends('main')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/css/bootstrap-extended.css" rel="stylesheet" />
	  <link href="/assets/css/style.css" rel="stylesheet" />
  <link href="/assets/css/icons.css" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	
			<div class="booking-part" id="main">
				@if($user->access == "admin")
				<a class="add_product_btn" href="{{route('managerProduct')}}">Manger car</a>
				@endif
					<div class="row g-3">
						<div class="col-lg-3 col-md-6 me-auto">
							<div class="ms-auto position-relative">
								<div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
								<input class="form-control ps-5" name="search" id="search" type="text" placeholder="search produts">
							</div>
						</div>
						<div class="col-lg-2 col-6 col-md-3">
							<div class="ms-auto position-relative">
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
						<div class="col-lg-1 col-6 col-md-3">
							<a class="openbtn add_product_btn left" onclick="openNav()"><i class="fa-regular fa-heart"></i></a>  			
						</div>
                    </div>
                  </div>
					
					<div class="tabs-car">						
						<div class="col-car all_data">
							@if(count($data) > 0)
							@foreach($data as $row)
							<div class="row-car">
								<div class="results_header">
									<div class="result-basic-infor">
										<input type="hidden" name="name_product" value="{{$row->name}}">
										<h3 >{{ $row->name }}</h3>
										<p>75D All-Wheel Drive
										24,293 mile odometer
										Peabody, MA</p>
									</div>
									<div class="result-basic-infor result-pricing">
										<input type="hidden" name="price_product" value="{{$row->price}}">
										<h3 >{{ $row->price }}$<a href="{{url('form_submit',$row->id)}}" type="submit" class="addtocart delete_product_btn"><i class="fa-regular fa-heart"></i></a></h3>
										<p>75D All-Wheel Drive
										24,293 mile odometer
										Peabody, MA</p>
									</div>
								</div>
								<div class="result-gallery">
									<div class="result-photo">
										<img src="{{ asset('/image/cars/' . $row->image) }}">
									</div>
								</div>
								<div class="result-highlights-cta">
									<ul class="highlight-list">
										<li>
											<h4>4.9s</h4>
											<p>0-60mph</p>
										</li>
										<li>
											<h4>130mph</h4>
											<p>Top Speed</p>
										</li>
										<li>
											<h4>237mi</h4>
											<p>range(EPA)</p>
										</li>
									</ul>
								</div>
								<input type="hidden" name="idcar" value="{{$row->id}}">
								<input type="hidden" name="product_image" value="{{$row->image}}">
								<div class="result-mobile-cta"> 
									<a href="{{url('cardetail',$row->id)}}" type="submit" class="result_view_details">View Details</a>
								</div>
								
							</div>
							@endforeach
							@endif
							
						</div>
						<div class="col-car search_data">
						</div>
					</div>
			</div>
			<div id="mySidebar" class="sidebar">
				<h3 class="title">Favourite</h3>
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
				
				@foreach ($carts as $cart) 
					<form class="form" action="{{url('cartdestroy',$cart->id)}}" method="POST">
					@csrf
					<div class="favour_box">
						<div class="section box">
							<h3>{{$cart->name_product}}</h3>
							<h3>{{$cart->price_product}}</h3>
						</div>
						
						<div class="favour_photo">
							<img src="{{ asset('/image/cars/' . $cart->product_image) }}">
						</div>
						<input type="submit" class="result_view_details" value="Delete">
						<button type="button" class="result_view_details">View Details</button>
					</div>
					</form>
				@endforeach
			</div>
		
</body>
<script src="/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.2.1/dist/jquery.min.js"></script>
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
            url:"{{ route('search_product_clent') }}",
            method:"GET",
            data:{'data':$value},
            success:function(res){
              $('.search_data').html(res);
          }
      });
    });
</script>

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
			  url:"{{ URL::to('searchProduct') }}",
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
                url:"{{ URL::to('choose_type_car_client') }}",
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
</html>

@endsection('content')