@extends('main')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link href="https://fonts.gstatic.com" rel="preconnect">
 	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	
	<div class="insert-tab">
        <form method="POST" action="{{route('cars.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="section cars">
            <div class="img-car">
                <div class="wrapper">
                    <header>File Uploader JavaScript</header>
                    <div class="img-upload">
                      <input class="file-input" type="file" name="image" >
                      <i class="fas fa-cloud-upload-alt"></i>
                      <p>Browse File to Upload</p>
                    </div>
                    <section class="progress-area"></section>
                    <section class="uploaded-area"></section>
                  </div>
            </div>
            <div class="infor-car">
                
                  <h3>Choose a car:</h3>
                  <select name="cars" id="cars">
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                  </select>

                  <h3>Details</h3>
                  <input type="text" name="name" value="Name" required>
                  <input type="text" name="fuel" value="Fuel" required>
                  <input type="text" name="power" value="Power" required>
                  <input type="text" name="type" value="type" required>
                  <select name="color" id="cars">
                    <option value="red">Red</option>
                    <option value="black">Black</option>
                  </select>
                  
                  <h3>Title and Description</h3>
                  <input type="text" name="price" value="Price" required>
                  <input type="text" name="Headline" value="Headline">

                  <button type="submit" class="push-car" >Push</button>
            </div>
        </div>
        </form>
    </div>
		
</body>
<script src="/js/main.js"></script>
</html>

@endsection('content')