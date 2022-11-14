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
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	
			<div class="booking-part" id="main">
				@if($user->access == "admin")
				<a class="add_product_btn" href="{{route('managerProduct')}}">Manger car</a>
				@endif
				<a class="openbtn add_product_btn left" onclick="openNav()"><i class="fa-regular fa-heart"></i></a>  			
					<div class="section">
						<div class="model">
							<div class="select-menu">
								<div class="select-btn">
									<span class="sBtn-text">Select your option</span>
									<i class="bx bx-chevron-down"></i>
								</div>
						
								<ul class="options">
									<li class="option">
										<span class="option-text">Github</span>
									</li>
									<li class="option">
										<span class="option-text">Instagram</span>
									</li>
									<li class="option">
										<span class="option-text">Linkedin</span>
									</li>
									<li class="option">
										<span class="option-text">Facebook</span>
									</li>
									<li class="option">
										<span class="option-text">Twitter</span>
									</li>
								</ul>
							</div>
						</div>
						<div class="type_car">
							<div class="select_wrapper">
								<div class="select-btn-option">
								  <span>Select Country</span>
								  <i class="uil uil-angle-down"></i>
								</div>
								<div class="content_select">
								  <div class="search">
									<i class="uil uil-search"></i>
									<input spellcheck="false" type="text" placeholder="Search">
								  </div>
								  <ul class="options_select"></ul>
								</div>
							</div>
						</div>
					</div>
					
					<div class="tabs-car">						
						<div class="col-car">
							@if(count($data) > 0)
							@foreach($data as $row)
							<div class="row-car">
								<form class="form" action="{{url('form_submit',$row->id)}}" method="POST">
								@csrf
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
										<h3 >{{ $row->price }}<button type="submit" class="addtocart delete_product_btn"><a href=""><i class="fa-regular fa-heart"></i></a></button></h3>
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
								</form>
								<div class="result-mobile-cta"> 
									<form class="form" action="{{url('cardetail',$row->id)}}" method="POST">
									@csrf
									<button type="submit" class="result_view_details">View Details</button>
									</form>
								</div>
								
							</div>
								{!! $data->links() !!}
							@endforeach
							@endif
							
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
	const optionMenu = document.querySelector(".select-menu"),
		selectBtn = optionMenu.querySelector(".select-btn"),
		options = optionMenu.querySelectorAll(".option"),
		sBtn_text = optionMenu.querySelector(".sBtn-text");

		selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

		options.forEach(option =>{
			option.addEventListener("click", ()=>{
				let selectedOption = option.querySelector(".option-text").innerText;
				sBtn_text.innerText = selectedOption;

				optionMenu.classList.remove("active");
			})
		})

		const wrapper = document.querySelector(".select_wrapper"),
		selectbtnoption = wrapper.querySelector(".select-btn-option"),
		searchInp = wrapper.querySelector("input"),
		optionsSelect = wrapper.querySelector(".options_select");

		let countries = ["Afghanistan", "Algeria", "Argentina", "Australia", "Bangladesh", "Belgium", "Bhutan",
						"Brazil", "Canada", "China", "Denmark", "Ethiopia", "Finland", "France", "Germany",
						"Hungary", "Iceland", "India", "Indonesia", "Iran", "Italy", "Japan", "Malaysia",
						"Maldives", "Mexico", "Morocco", "Nepal", "Netherlands", "Nigeria", "Norway", "Pakistan",
						"Peru", "Russia", "Romania", "South Africa", "Spain", "Sri Lanka", "Sweden", "Switzerland",
						"Thailand", "Turkey", "Uganda", "Ukraine", "United States", "United Kingdom", "Vietnam"];

		function addCountry(selectedCountry) {
			optionsSelect.innerHTML = "";
			countries.forEach(country => {
				let isSelected = country == selectedCountry ? "selected" : "";
				let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
				optionsSelect.insertAdjacentHTML("beforeend", li);
			});
		}
		addCountry();

		function updateName(selectedLi) {
			searchInp.value = "";
			addCountry(selectedLi.innerText);
			wrapper.classList.remove("active");
			selectbtnoption.firstElementChild.innerText = selectedLi.innerText;
		}

		searchInp.addEventListener("keyup", () => {
			let arr = [];
			let searchWord = searchInp.value.toLowerCase();
			arr = countries.filter(data => {
				return data.toLowerCase().startsWith(searchWord);
			}).map(data => {
				let isSelected = data == selectbtnoption.firstElementChild.innerText ? "selected" : "";
				return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
			}).join("");
			optionsSelect.innerHTML = arr ? arr : `<p style="margin-top: 10px;">Oops! Country not found</p>`;
		});

		selectbtnoption.addEventListener("click", () => wrapper.classList.toggle("active"));
</script>
</html>

@endsection('content')