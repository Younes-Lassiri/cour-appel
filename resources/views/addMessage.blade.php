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
        <x-admin_navbar/>
        <div class="formSection">
            <h1>إضافة واردة</h1>
            
            <span style="font-size: 12px">(*) يجب ملء الخانات التي تحتوي على</span>
            <form action={{ route('message.store') }} method="POST">
                @csrf


                <div class="inputLabel">
                    <input type="number" id="allInputs1" class="input-field" name="message_number" onchange="changeee()">
                    <label for="" class="input-label" id="issue1"><span>*  </span>رقم الرسالة</label>
                </div>
        
                
                @if($errors->has('message_number'))
                        <span style="font-size: 13px">{{ $errors->first('message_number') }}</span>
                    @endif

                <div class="">
                    <label for="">تاريخ الرسالة</label><br>
                    
                    <div class="inputLabel" style="display: inline">
                        <select name="message_day" id="d1" class="input-field" style="width: 13%;color: #c5c4c4" onchange="done()">
                            <option value="" hidden></option>
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endfor
                        </select>
                        <label for="" class="input-labelD" id="selectD1"><span>* </span>اليوم</label>
                    </div>
                    
                    <div class="inputLabel" style="display: inline">
                    <select name="message_month" id="d2" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dtwo()">
                        <option value="" hidden></option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD2"><span>* </span>الشهر</label>
                </div>

                <div class="inputLabel" style="display: inline">
                    <select name="message_year" id="d3" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dthree()">
                        <option value="" hidden></option>
                        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD3"><span>* </span>السنة</label>
                    
                </div>
                    
                    
                </div>


                @if($errors->has('message_month') || $errors->has('message_day') || $errors->has('message_year'))
                <span style="font-size: 13px">
                    {{ $errors->first('message_month') }}
                </span>
            @endif
        
        
                
                <div >
                    <label for="">تاريخ وصولها</label><br>

                    <div class="inputLabel" style="display: inline">
                        <select name="received_day" id="d4" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dfour()">
                            <option value="" hidden></option>
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endfor
                        </select>
                        <label for="" class="input-labelD" id="selectD4"><span>* </span>اليوم</label>
                    </div>
                    
                    <div class="inputLabel" style="display: inline">
                    <select name="received_month" id="d5" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dfive()">
                        <option value="" hidden></option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD5"><span>* </span>الشهر</label>
                        
                    </div>
                    
                    

                

                <div class="inputLabel" style="display: inline">
                    <select name="received_year" id="d6" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dsix()">
                        <option value="" hidden></option>
                        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD6"><span>* </span>السنة</label>
                    
                </div>
                    
                
                </div>
                @if($errors->has('received_month') || $errors->has('received_day') || $errors->has('received_year'))
                <span style="font-size: 13px">
                    {{ $errors->first('received_month') }}
                </span>
            @endif
            


                
                    



                <div class="inputLabel">
                    <input type="text" id="allInputs2" class="input-field" name="sender_name" onchange="changeeee()">
                    <label for="" class="input-label" id="issue2"><span>*  </span>إسم المرسِل</label>
                </div>
                @if($errors->has('sender_name'))
                        <span style="font-size: 13px">{{ $errors->first('sender_name') }}</span>
                    @endif
        
        
                

                <div class="inputLabel">
                    <select id="allInputs" class="input-field" name="sender_city" onchange="change()">
                        <option value="" hidden></option>
                        <option value="العيون">العيون</option>
                        <option value="الرباط">الرباط</option>
                        <option value="الدار البيضاء">الدار البيضاء</option>
                        <option value="مراكش">مراكش</option>
                        
                        
                    </select>
                    <label for="" class="input-label" id="select"><span>*  </span>موطن المرسِل</label>
                </div>

                @if($errors->has('sender_city'))
                        <span style="font-size: 13px">{{ $errors->first('sender_city') }}</span>
                    @endif



                <div class="inputLabel my-3">
                    <input type="text" id="allInputs3" class="input-field" name="message_object" onchange="changee()">
                    <label for="" class="input-label" id="issue3"><span>*  </span>الموضوع</label>
                </div>


                <div>@if($errors->has('message_object'))
                    <span style="font-size: 13px">{{ $errors->first('message_object') }}</span>
                @endif</div>



<div>
    <button type="submit">حفظ</button></div>
            </form>
        </div>



        
    </div>
<x-foo_ter/>


    <script src="/js/main.js"></script>
</body>
</html>