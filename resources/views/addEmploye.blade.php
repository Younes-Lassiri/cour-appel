<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    
</head>
<body>


<div class="admin-signup-section">
    

    <x-landing-section_head />

    <div class="adminCreationForm">
        <div class="adminCreationFormOne">
            <img src="/img/justice.png" alt="">
        </div>


        <div class="adminCreationFormTwo">
            <h1>إنشاء حساب</h1>
        
        <form action={{ route('employe.signup') }} method="POST">
            @csrf
            <div class="inputLabel">
                <input type="text" id="allInputs1" class="input-field" name="employe_name" onchange="changeee()">
                <label for="" class="input-label" id="issue1"><span>*  </span>الإسم الكامل</label>
            </div>
            @if($errors->has('employe_name'))
                <span style="font-size: 13px">{{ $errors->first('employe_name') }}</span>
            @endif
            <div class="inputLabel">
                <input type="text" id="allInputs2" class="input-field" name="employe_email" onchange="changeeee()">
                <label for="" class="input-label" id="issue2"><span>*  </span>البريد الإلكتروني</label>
            </div>
            @if($errors->has('employe_email'))
                <span style="font-size: 13px">{{ $errors->first('employe_email') }}</span>
            @endif
            <div class="inputLabel">
                <input type="password" id="allInputs3" class="input-field" name="employe_password" onchange="changee()">
                <label for="" class="input-label" id="issue3"><span>*  </span>كلمة السر</label>
            </div>
            @if($errors->has('employe_password'))
                <span style="font-size: 13px">{{ $errors->first('employe_password') }}</span>
            @endif

            

            <div class="inputLabel">
                <input type="password" id="confirme1" class="input-field" name="employe_password_confirmation" onchange="confirme()">
                <label for="" class="input-label" id="confirme1L"><span>*  </span>تأكيد كلمة السر</label>
            </div>
            @if ($errors->has('employe_password_confirmation'))
                <div class="error-message">
                    {{ $errors->first('employe_password_confirmation') }}
                </div>
            @endif

            <div class="div-login-link"><a href="/admin-login" class="login-link">هل لديك حساب بالفعل؟</a></div>


            
            <div class="terms-checkbox">
                <input type="checkbox" id="terms-checkbox" name="accept_terms">
                <label for="terms-checkbox">أوافق على الشروط والأحكام</label>
            </div>
            

            <div>
                <button type="submit">إنشاء</button>
            </div>
        </form>
        </div>
    </div>
</div>

<x-foo_ter/>
    <script src="/js/main.js"></script>
</body>
</html>








