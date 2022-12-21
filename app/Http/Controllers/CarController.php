<?php

namespace App\Http\Controllers;

use App\Models\cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = cars::latest()->paginate(10);
        $carts = DB::table('carts')->where('iduser', Auth::user()->id)->get();
        $user = Auth::user();
        if(DB::table('carts')->where('iduser', Auth::user()->id)->get()==null){
            return view('sellcar', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5)->with('user', $user);
        }else{
            return view('sellcar', compact('data'), ["carts" => $carts])->with('user', $user)->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action/insertProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|image|mimes:jpg,png,jpeg,gif'
        ]);
    
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('image/cars'), $file_name);

        $car = new cars;

        $car->name = $request->name;
        $car->fuel = $request->fuel;
        $car->quantity = $request->quantity;
        $car->power = $request->power;
        $car->price = $request->price;
        $car->type = $request->type;
        $car->color = $request->color;
        $car->image = $file_name;

        $car->save();
        return redirect()->route('managerProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(cars $cars)
    {
        //
    }

    public function editView(Request $request, $id){
        $car = DB::table('cars')->where('id', $id)->first();
        return view('action/editProduct')->with('data',$car);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cars $car)
    {
        $car_image = $request->hidden_image;

        if($request->image != '')
        {
            $car_image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $car_image);
        }

        $car = cars::find($request->id_hidden);
        $car->name = $request->name;
        $car->fuel = $request->fuel;
        $car->power = $request->power;
        $car->price = $request->price;
        $car->type = $request->type;
        $car->color = $request->color;
        $car->image = $car_image;

        $car->save();
        return redirect()->route('managerProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('query');
        $car = cars::find($id);
        $car->delete();
        $data = cars::all();
        return redirect()->route('managerProduct')->with('product',$data);
    }

    public function managerProduct(){
        $data = cars::all();
        return view('admin/managerProduct')->with('product',$data);
    }

    
    function action(Request $request)
    {
        $output = "";
        $car = cars::where('name','like','%'.$request->data.'%')->orWhere('price','like','%'.$request->data.'%')->get();

        foreach($car as $car){
            $output.='
            <div class="col">
            <div class="card border shadow-none mb-0">
            <div class="card-body text-center">
                <img src="'.asset('/image/cars/' . $car->image).'" class="img-fluid mb-3" alt=""/>
                <h6 class="product-title">'.$car->name.'</h6>
                <input class="id_product" type="text" value="'.$car->id.'" hidden>
                <p class="product-price fs-5 mb-1"><span>'.$car->price.'$</span></p>
                <small>Quantity '.$car->quantity.'</small>

                        <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                        <a href="/editProduct/'.$car->id.'" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-fill"></i><button class="delete_product_btn" type="submit">Edit</button></a>
                        <a class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</a>
                    </div>
            </div>
            </div>
            </div>

            <script>
            document.querySelectorAll(".btn-outline-danger").forEach((tab, index) => {
                document.querySelectorAll(".btn-outline-danger")[index].onclick = function (){
                  document.getElementById("idxoa").innerHTML = $(this).closest(".text-center").find(".id_product").val();
                }
              });

             $(".btn-outline-danger").click(function(){
                $(".popup_box").css("display", "block");
              });

              $(".btn1").click(function(){
                $(".popup_box").css("display", "none");
              });
              $(".btn2").click(function(){
                $(".popup_box").css("display", "none");
                delete_product(document.getElementById("idxoa").innerHTML);
              });
            </script>
            ';
        }

        return response($output);
    }

    public function search_price_products(Request $request)
    {
        $products = cars::whereBetween('price',[0, $request->data])->get();
        return view('search_result')->with('products',$products)->render();
    }

    public function search_product_clent(Request $request){
        $products = cars::whereBetween('price',[0, $request->data])->get();
        return view('action/search_result_client')->with('products',$products)->render();
    }

    function searchProduct(Request $request)
    {
        $output = "";
        $car = cars::where('id','like','%'.$request->data.'%')->orWhere('name','like','%'.$request->data.'%')->orWhere('price','like','%'.$request->data.'%')->orWhere('type','like','%'.$request->data.'%')->get();
        foreach($car as $row){
            $output.='  
            <div class="row-car">
            <div class="results_header">
                <div class="result-basic-infor">
                    <input type="hidden" name="name_product" value="'.$row->name.'">
                    <h3 >'. $row->name .'</h3>
                    <p>75D All-Wheel Drive
                    24,293 mile odometer
                    Peabody, MA</p>
                </div>
                <div class="result-basic-infor result-pricing">
                    <input type="hidden" name="price_product" value="'.$row->price.'">
                    <h3 >'. $row->price .'$<a href="'.url('form_submit',$row->id).'" type="submit" class="addtocart delete_product_btn"><i class="fa-regular fa-heart"></i></a></h3>
                    <p>75D All-Wheel Drive
                    24,293 mile odometer
                    Peabody, MA</p>
                </div>
            </div>
            <div class="result-gallery">
                <div class="result-photo">
                    <img src="'. asset('/image/cars/' . $row->image) .'">
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
            <input type="hidden" name="idcar" value="'.$row->id.'">
            <input type="hidden" name="product_image" value="'.$row->image.'">
            <div class="result-mobile-cta"> 
                <a href="'.url('cardetail',$row->id).'" type="submit" class="result_view_details">View Details</a>
            </div>
            
        </div>

            ';
        }

        return response($output);
    }

    function choose_type_car(Request $request)
    {
        $output = "";
        $car = cars::Where('type','like','%'.$request->data.'%')->get();
        foreach($car as $car){
            $output.='
            <div class="col">
            <div class="card border shadow-none mb-0">
            <div class="card-body text-center">
                <img src="'.asset('/image/cars/' . $car->image).'" class="img-fluid mb-3" alt=""/>
                <h6 class="product-title">'.$car->name.'</h6>
                <input class="id_product" type="text" value="'.$car->id.'" hidden>
                <p class="product-price fs-5 mb-1"><span>'.$car->price.'$</span></p>
                <small>Quantity '.$car->quantity.'</small>

                        <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                        <a href="/editProduct/'.$car->id.'" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-fill"></i><button class="delete_product_btn" type="submit">Edit</button></a>
                        <a class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</a>
                    </div>
            </div>
            </div>
            </div>

            <script>
            document.querySelectorAll(".btn-outline-danger").forEach((tab, index) => {
                document.querySelectorAll(".btn-outline-danger")[index].onclick = function (){
                  document.getElementById("idxoa").innerHTML = $(this).closest(".text-center").find(".id_product").val();
                }
              });

             $(".btn-outline-danger").click(function(){
                $(".popup_box").css("display", "block");
              });

              $(".btn1").click(function(){
                $(".popup_box").css("display", "none");
              });
              $(".btn2").click(function(){
                $(".popup_box").css("display", "none");
                delete_product(document.getElementById("idxoa").innerHTML);
              });
            </script>
            ';
        }

        return response($output);
    }

    function choose_type_car_client(Request $request)
    {
        $output = "";
        $car = cars::Where('type','like','%'.$request->data.'%')->get();
        foreach($car as $row){
            $output.='
            <div class="row-car">
            <div class="results_header">
                <div class="result-basic-infor">
                    <input type="hidden" name="name_product" value="'.$row->name.'">
                    <h3 >'. $row->name .'</h3>
                    <p>75D All-Wheel Drive
                    24,293 mile odometer
                    Peabody, MA</p>
                </div>
                <div class="result-basic-infor result-pricing">
                    <input type="hidden" name="price_product" value="'.$row->price.'">
                    <h3 >'. $row->price .'$<a href="'.url('form_submit',$row->id).'" type="submit" class="addtocart delete_product_btn"><i class="fa-regular fa-heart"></i></a></h3>
                    <p>75D All-Wheel Drive
                    24,293 mile odometer
                    Peabody, MA</p>
                </div>
            </div>
            <div class="result-gallery">
                <div class="result-photo">
                    <img src="'. asset('/image/cars/' . $row->image) .'">
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
            <input type="hidden" name="idcar" value="'.$row->id.'">
            <input type="hidden" name="product_image" value="'.$row->image.'">
            <div class="result-mobile-cta"> 
                <a href="'.url('cardetail',$row->id).'" type="submit" class="result_view_details">View Details</a>
            </div>
            
        </div>
            ';
        }

        return response($output);
    }
}
