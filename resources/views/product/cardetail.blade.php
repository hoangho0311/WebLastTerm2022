@extends('main')
@section('content')
<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--plugins-->

  <title>Bookcar - Dashboard</title>
</head>

<body>
    <div class="option-widget">
        <div class="cf-asset-wrapper">
            <div class="gallery_asset--section">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img class="" src="/image/product/car1.jfif">
                    </div>
                    <div class="mySlides fade">
                        <img class="" src="/image/product/car2.jfif">
                    </div>
                    <div class="mySlides fade">
                        <img class="" src="/image/product/car3.jfif">
                    </div>
                    <div class="mySlides fade">
                        <img class="" src="/image/product/compositor.jfif">
                    </div>
                    
                    
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    
                    </div>
                
            </div>
        </div>
        
        <form id="algin-form" method="POST" action="{{url('add_currentcar',$product->id)}}">
        @csrf
        <div class="group-section">
            <div class="group-container">
                <div class="hide_group_1 action"> 
                    <div class="aside-section side-scroll--item">
                        <div class="vehicle-summary-container">
                            <div class="vehicleName-info-block tds-text--center bot_dow">
                                <h1 class="bot_dow">{{$product->name}}</h1>
                                <span>Model 3 Standard Range Plus Rear-Wheel Drive</span>
                            </div>
                            <div class="section bot_dow">
                                <ul class="tds-list">
                                    <li>
                                        <div class="text-vehicle">240</div>
                                        <span>range</span>
                                    </li>
                                    <li>
                                        <div class="text-vehicle">140mph</div>
                                        <span>Top Speed</span>
                                    </li>
                                    <li>
                                        <div class="text-vehicle">5.3sec</div>
                                        <span>0-60 mph</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="vehicleSummary-info-block bot_dow">
                                <h2>Vehicle Details</h2>
                                <div class="info-block-content">
                                    <ul>
                                        <li>Used Vehicle</li>
                                        <li>13,502 mile odometer</li>
                                        <li>13,502 mile odometer</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside-section side-scroll--item">
                        <div class="vehicle-summary-container">
                            <div class="vehicleName-info-block tds-text--center bot_dow">
                                <h1 class="bot_dow">Basic Autopilot</h1>
                            </div>
                            <div class="vehicleSummary-info-block bot_dow">
                                <p>The currently enabled features require active driver supervision and do not make the vehicle autonomous. The activation and use of these features are dependent on achieving reliability far in excess of human drivers as demonstrated by billions of miles of experience, as well as regulatory approval, which may take longer in some jurisdictions. As these self-driving features evolve, your car will be continuously upgraded through over-the-air software updates.</p>
                            </div>
                        </div>
                    </div>
                    <div class="aside-section side-scroll--item">
                        <div class="vehicle-summary-container">
                            <div class="vehicleName-info-block tds-text--center bot_dow">
                                <h1 class="bot_dow">Delivery Location</h1>
                                <span>Find your nearest delivery center by entering your registration zip code</span>
                            </div>
                            
                            <div class="vehicleSummary-info-block bot_dow">
                                <p>Registration Zip Code</p>
                                <input type="text">
                            </div>
                            <div class="tds-btn_group">
                                <button type="button" class="tds-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                    <div class="aside-section side-scroll--item">
                        <div class="vehicle-summary-container">
                            <div class="vehicleName-info-block tds-text--center bot_dow">
                                <h1 class="bot_dow">Order Your Model</h1>
                            </div>
                            
                            <div class="vehicleSummary-info-block bot_dow">
                                <p>Range figures based on testing new vehicles to EPA standards. Vehicle range may change depending on battery age and condition, vehicle configuration, driving style, environmental and climate conditions.</p>
                            </div>
                            <div class="tds-btn_group">
                                <button type="button" class="tds-btn" onclick="payment()">Continue to payment</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide_group_1"> 
                    <div class="aside-section side-scroll--item">
                        <div class="vehicle-summary-container">
                            <button type="button" class="paymentbackbtn" onclick="paymentback()"><i class="fa-solid fa-arrow-left-long"></i></button>
                            <div class="vehicleName-info-block tds-text--center bot_dow">
                                <h1 class="bot_dow">Your Model 3</h1>
                            </div>
                            
                            <div class="cf-summary--section">
                                <div class="vehicleSummary-info-block bot_dow_25">
                                    <div class="info-block-content">
                                        <ul class="cf-summary-list">
                                            <li>2020 Model 3 Standard Range Plus Rear-Wheel Drive</li>
                                            <li>Pearl White Paint</li>
                                            <li>All Black Partial Premium Interior</li>
                                            <li>Autopilot</li>
                                            <li>Front and Rear Heated Seats</li>
                                            <li>30-Day Premium Connectivity Trial</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="price-block">
                                    <div class="info-block-content bot_dow_25">
                                    <ul>
                                        <li>
                                            <span class="price_text">Purchase Price</span>
                                            <span class="span_r">$45,400</span>
                                        </li>
                                        <li>
                                            <span >Price after Est. Savings</span>
                                            <span class="span_r">$38,800</span>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="price-block">
                                    <div class="info-block-content bot_dow_25">
                                    <ul>
                                        <li>
                                            <span class="price_text">Purchase Price</span>
                                            <span class="span_r">$45,400</span>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="result_view_details">Order With Card</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

    </div>
   
    

</body>
<script>
    let paymentBtn = document.getElementsByClassName("hide_group_1");
    function payment(){
        paymentBtn[0].classList.remove("action");
        paymentBtn[1].classList.add("action");

    }
    function paymentback(){
        paymentBtn[0].classList.add("action");
        paymentBtn[1].classList.remove("action");
    }

    let slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
      }
      slides[slideIndex-1].style.display = "block";  
    }
    </script>

    
</html>
@endsection('content')