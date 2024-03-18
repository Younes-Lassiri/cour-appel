<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="addMessage">


        
        
        <x-landing-section_head />
        
        <x-user_navbar/>
        <div class="formSection">
            <h1>إضافة صادرة</h1>
            
            <span style="font-size: 12px">(*) يجب ملء الخانات التي تحتوي على</span>
            <form action={{ route('response.create') }} method="POST">
                @csrf
                <div class="inputLabel">
                    <label for="" class="" id=""><span> </span>رقم الرسالة</label><br>
                    <input type="number" id="allInputs1" class="input-field" value="{{ $message->message_number }}" readonly>
                    
                </div>
                <div >
                <div class="inputLabel">
                    <label for="" class="" id="issue2"><span>  </span>إسم المرسِل</label><br>
                    <input type="text" id="allInputs2" class="input-field" value="{{ $message->sender_name }}" readonly>
                    
                </div>
                <div class="inputLabel">
                    <label for="" class="" id="select"><span> </span>موطن المرسِل</label><br>
                    <input type="text" id="allInputs2" class="input-field" value="{{ $message->sender_city }}" readonly>

                </div>
                <div class="inputLabel my-3">
                    <label for="" class="" id=""><span>  </span>الموضوع</label><br>
                    <input type="text" id="allInputs3" class="input-field" value="{{ $message->message_object }}" readonly>
                    
                </div>


        <input type="hidden" name="message_id" value="{{ $id }}">


        <div class="inputLabel my-3">
            <input type="text" id="allInputs3" class="input-field" name="response_source" onchange="changee()">
            <label for="" class="input-label" id="issue3"><span>*  </span>المصدر و الجواب</label>
        </div>

        <div class="inputLabel my-3">
            <input type="text" id="allInputs1" class="input-field" name="response_result" onchange="changeee()">
            <label for="" class="input-label" id="issue1"><span>*  </span>النتيجة</label>
        </div>

            <div>
                <button type="submit">حفظ</button>
            </div>
            </form>
            </div>
    </div>

    <div>
    <x-foo_ter/>
    </div>

    <script src="/js/main.js"></script>
</body>
</html>