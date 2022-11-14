@extends('Main1')
<head>
    <link rel="stylesheet" href="/css/style.css">
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
  </head>
@section('content')
  <body> 
      
      <div class="logo">
        <img src="/image/logo.png" alt="" class="logo_img">
        <h1>Login</h1>
        <form action="{{ route('sample.validate_login') }}" method="post">
          @csrf
          <div class="txt_field">
            <input type="email" name="email" required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
            <input type="password" name="password" required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass">Forgot Password?</div>
          <input type="submit" class="loginbtn" value="Login">
          <div class="signup_link">
            @if ($message = Session::get('success'))
                <div class="alert alert-info">{{ $message }}</div>
            @endif
            <div class="d-grid">
              <a class="btn btn-white radius-30" href="{{route('google-auth')}}"><span class="d-flex justify-content-center align-items-center">
                  <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="">
                  <span>Sign in with Google</span>
                </span>
              </a>
            </div>
            Not a member? <a href="{{ route('registration') }}">Signup</a>
          </div>
        </form>
      </div>

  </body>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/pace.min.js"></script>


@endsection('content')