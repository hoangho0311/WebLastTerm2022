@foreach($products as $row)
    <div class="col">
        <div class="card border shadow-none mb-0">
        <div class="card-body text-center">
            <img src="{{ asset('/image/cars/' . $row->image) }}" class="img-fluid mb-3" alt=""/>
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
