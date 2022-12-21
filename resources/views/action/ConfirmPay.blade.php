<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Confirm Pay</title>
<link rel="icon"  href="/image/logo.png">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	font-family: 'Varela Round', sans-serif;
}
.modal-confirm {		
	color: #434e65;
	width: 525px;
}
.modal-confirm .modal-content {
	padding: 20px;
	font-size: 16px;
	border-radius: 5px;
	border: none;
}
.success{
    background: #47c9a2;
}
.error{
    background: red;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
	text-align: center;
	margin: -20px -20px 0;
	border-radius: 5px 5px 0 0;
	padding: 35px;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 36px;
	margin: 10px 0;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-confirm .close {
	position: absolute;
	top: 15px;
	right: 15px;
	color: #fff;
	text-shadow: none;
	opacity: 0.5;
}
.modal-confirm .close:hover {
	opacity: 0.8;
}
.modal-confirm .icon-box {
	color: #fff;		
	width: 95px;
	height: 95px;
	display: inline-block;
	border-radius: 50%;
	z-index: 9;
	border: 5px solid #fff;
	padding: 15px;
	text-align: center;
}
.modal-confirm .icon-box i {
	font-size: 64px;
	margin: -4px 0 0 -4px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn, .modal-confirm .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #eeb711 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border-radius: 30px;
	margin-top: 10px;
	padding: 6px 20px;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #eda645 !important;
	outline: none;
}
.modal-confirm .btn span {
	margin: 1px 3px 0;
	float: left;
}
.modal-confirm .btn i {
	margin-left: 1px;
	font-size: 20px;
	float: right;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style>
</head>
<body>
    
<!-- Modal HTML -->
@if(Request::get('vnp_TransactionStatus') == "00")
    <form action="{{url('store_vnpay')}}">
    @csrf
    <input type="text" name="vnp_TransactionNo" value="{{ Request::get('vnp_TransactionNo') }}" hidden>   
    <input type="text" name="vnp_Amount" value="{{ Request::get('vnp_Amount') }}" hidden>   
    <input type="text" name="vnp_BankCode" value="{{ Request::get('vnp_BankCode') }}" hidden>   
    <input type="text" name="vnp_OrderInfo" value="{{ Request::get('vnp_OrderInfo') }}" hidden>  
    <input type="text" name="vnp_BankTranNo" value="{{ Request::get('vnp_BankTranNo') }}" hidden>   
    @if(Request::get('vnp_TransactionStatus') == "00")
    <input type="text" name="vnp_TransactionStatus" value="success" hidden>   
    @else
    <input type="text" name="vnp_TransactionStatus" value="Consider" hidden>   
    @endif
    <div >
        <div class="modal-dialog modal-confirm shadow-lg ">
            <div class="modal-content">
                <div class="modal-header justify-content-center success">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <h4>Success!</h4>	
                    <p>Your transaction {{ Request::get('vnp_TransactionNo') }} has been done.</p>
                    <button type="submit" class="btn btn-success" data-dismiss="modal"><span>OK</span> <i class="material-icons">&#xE5C8;</i></button>
                </div>
            </div>
        </div>
    </div>  
    </form>
@else
    <div >
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header error">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>				
                    <h4 class="modal-title w-100">Sorry!</h4>	
                </div>
                <div class="modal-body">
                    <p class="text-center">Your transaction has failed. Please go back and try again.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{route("dashboard")}}" class="btn btn-danger btn-block" data-dismiss="modal">OK</a>
                </div>
            </div>
        </div>
    </div>     
@endif
   
</body>
</html>                            