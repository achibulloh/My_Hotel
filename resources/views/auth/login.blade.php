<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Login | My Hotel</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="{{ asset('assets/img/logo-google.png') }}" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">My Hotel</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this platform.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <form action="{{route('proses_login')}}" method="POST">
                    @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg bg-light fs-6" id="email" placeholder="Enter Your Email Address" name="email" value="{{old('email')}}">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg bg-light fs-6" id="password" name="password" value="{{old('password')}}" placeholder="Enter Your Password" autocomplete="current-password">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button name="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                </form>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="{{ asset('assets/img/logo-google.png') }}" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                </div>                
                <div class="input-group mb-3">
                    <a class="btn btn-lg btn-primary w-100 fs-6" href="register">Sign Up</a>
                </div>
          </div>
       </div> 

      </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(Session::has("fail"))
    <script>
        Swal.fire({
              position: 'top-center',
              icon: 'error',
              title: '{{Session::get('fail')}}',
              showConfirmButton: false,
              timer: 1500 
        })
     </script>
@endif
@if(Session::has("success"))
    <script>
        Swal.fire({
              position: 'top-center',
              icon: 'success',
              title: '{{Session::get('success')}}',
              showConfirmButton: false,
              timer: 1500 
        })
     </script>
@endif
</body>
</html>