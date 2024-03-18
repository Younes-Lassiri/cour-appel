<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>

    @if (session()->has('add'))
  <script>
      Swal.fire({
          position: "center-center",
          icon: "success",
          title: "{{ session('add') }}",
          showConfirmButton: false,
          timer: 2000
      });
  </script>
@endif

    @if (session()->has('login'))
  <script>
      Swal.fire({
          position: "center-center",
          icon: "error",
          title: "{{ session('login') }}",
          showConfirmButton: false,
          timer: 2000
      });
  </script>
@endif

<div class="user-login-section">
    <x-landing-section_head />

    <div class="userLoginForm">
        <div class="userLoginFormOne">
            <img src="/img/justice.png" alt="">
        </div>

        
  

        <div class="userLoginFormTwo">
            <h1>تسجيل الدخول</h1>
        
        <form action={{ route('admin.login') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="allInputs2" class="input-field" name="email" onchange="changeeee()">
                <label for="" class="input-label" id="issue2"><span>*  </span>البريد الإلكتروني</label>
            </div>
            @if($errors->has('email'))
                <span style="font-size: 13px">{{ $errors->first('email') }}</span>
            @endif
            <div class="inputLabel">
                <input type="password" id="allInputs3" class="input-field" name="password" onchange="changee()">
                <label for="" class="input-label" id="issue3"><span>*  </span>كلمة السر</label>
            </div>
            @if($errors->has('password'))
                <span style="font-size: 13px">{{ $errors->first('password') }}</span>
            @endif

            <div class="div-login-link"><a href="/admin-signup" class="login-link">ليس لديك حساب؟</a></div>
            <div>
                <button type="submit">تسجيل الدخول</button>
            </div>
        </form>
        </div>
    </div>
</div>

<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








