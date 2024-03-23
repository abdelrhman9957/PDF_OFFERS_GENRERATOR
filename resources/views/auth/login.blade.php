<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta name="description" content="{{$siteName}}">
  <meta property="og:image" content="{{$siteLogo}}"> --}}
  <title>دخول الي لوحه التحكم</title>
  <link rel="shortcut icon" href="{{asset('dashboard/bg.jpg')}}" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  {{-- <link rel="shortcut icon" href="{{asset($siteIcon)}}" /> --}}
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("{{asset('dashboard/bg.jpg')}}");
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .login-form {
      text-align: center;
    }

    .login-form h1 {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .user-icon {
      font-size: 40px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="login-container col-sm-10 col-md-8 col-lg-4">
        <div class="login-form">
          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="text-center mb-3">
              <i class="fas fa-user-circle fa-6x user-icon"></i>
              <h5 class="mb-0">دخول الي لوحه التحكم</h5>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                  </span>
                </div>
                <input type="email" class="form-control" placeholder="البريد الإلكتروني" name="email" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                  </span>
                </div>
                <input type="password" class="form-control" placeholder="كلمة المرور" name="password" required>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-success btn-block" value="دخول" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@if (Session::has('failed'))

{{-- <script src="{{ URL::asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.css" integrity="sha512-yX1R8uWi11xPfY7HDg7rkLL/9F1jq8Hyiz8qF4DV2nedX4IVl7ruR2+h3TFceHIcT5Oq7ooKi09UZbI39B7ylw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.20/sweetalert2.min.js" integrity="sha512-2AOp8GEFv1X43dZpYqOp34WD+skmM18yOrCxS/S1Mh6VShz7uxlPhKmA98fsPrE7MMMtZgjshiMHKmzWtZR5uA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    Swal.fire({
    position: 'top-end',
    icon: 'error',
    title: '{{ session()->get('failed') }}',
    showConfirmButton: false,
    timer: 5000
    })
</script>
@endif
</body>
</html>
