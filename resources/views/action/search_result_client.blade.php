@foreach($products as $row)
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
