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
    <div class="addMessage hh">
        <x-landing-section_head />
        <x-admin_navbar/>
        <div class="formSection">
            <h1>ملئ طلب غياب</h1>
            
            <span style="font-size: 12px">(*) يجب ملء الخانات التي تحتوي على</span>
            <form action='{{ route('demande.store') }}' method="POST">
                @csrf
                <div class="inputLabel">
                    <input type="text" id="allInputs1" class="input-field" name="employe_name" onchange="changeee()" value="{{ $authName }}" readonly>
                    <label for="" class="input-label" id="issue1" style="top: 0; background: white; color: green; padding: 0 5px; font-size: 12px"><span>*  </span>إسم الموظف</label>
                </div>
                <div class="">
                    <label for="">من</label><br>
                    <div class="inputLabel" style="display: inline">
                        <select name="from_day" id="d1" class="input-field" style="width: 13%;color: #c5c4c4" onchange="done()">
                            <option value="" hidden></option>
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endfor
                        </select>
                        <label for="" class="input-labelD" id="selectD1"><span>* </span>اليوم</label>
                    </div>
                    
                    <div class="inputLabel" style="display: inline">
                    <select name="from_month" id="d2" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dtwo()">
                        <option value="" hidden></option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD2"><span>* </span>الشهر</label>
                </div>

                <div class="inputLabel" style="display: inline">
                    <select name="from_year" id="d3" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dthree()">
                        <option value="" hidden></option>
                        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD3"><span>* </span>السنة</label>
                </div>
                </div>
                <div >
                    <label for="">إلى</label><br>
                    <div class="inputLabel" style="display: inline">
                        <select name="to_day" id="d4" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dfour()">
                            <option value="" hidden></option>
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endfor
                        </select>
                        <label for="" class="input-labelD" id="selectD4"><span>* </span>اليوم</label>
                    </div>
                    <div class="inputLabel" style="display: inline">
                    <select name="to_month" id="d5" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dfive()">
                        <option value="" hidden></option>
                        @for ($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 1)) }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD5"><span>* </span>الشهر</label>
                    </div>
                <div class="inputLabel" style="display: inline">
                    <select name="to_year" id="d6" class="input-field" style="width: 13%;color: #c5c4c4" onchange="dsix()">
                        <option value="" hidden></option>
                        @for ($year = date('Y'); $year >= date('Y') - 100; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    <label for="" class="input-labelD" id="selectD6"><span>* </span>السنة</label>
                </div>
                </div>
                <div class="inputLabel my-3">
                    <input type="text" id="allInputs3" class="input-field" name="reason" onchange="changee()">
                    <label for="" class="input-label" id="issue3"><span>*  </span>السبب</label>
                </div>
<div>
    <button type="submit">حفظ</button></div>
            </form>
        </div>  
    </div>
<x-foo_ter/>


    <script src="/js/main.js"></script>
</body>
</html>