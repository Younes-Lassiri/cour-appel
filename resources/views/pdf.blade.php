<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @media print {
    @page {
        margin: 0;
    }

    @page {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
    button{
        display: none
    }
}

.date{
    position: absolute;
    top: 35px;
    left: 20px
}

.chikaya{
    position: absolute;
    top: 90px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 25px
}

.modo3{
    position: absolute;
    top: 140px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 20px
}

.to{
    position: absolute;
    top: 200px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 600;
    font-size: 20px
}

.toPers{
    position: absolute;
    top: 250px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 700;
    font-size: 20px
}
.one{
    position: absolute;
    top: 320px;
    right: 20px;
    font-weight: 400
}
.onee{
    position: absolute;
    top: 350px;
    right: 20px;
    font-weight: 400
}

.oneee{
    position: absolute;
    top: 380px;
    right: 20px;
    font-weight: 400
}


    </style>
</head>
<body>
    <div>
        

        <span class="date">{{ str_replace('-', '/', $messageDate) }} المدينة {{ $senderCity }} بتاريخ </span>

        <h4 class="chikaya">شكاية</h4>


        <h4 class="modo3">حول {{ $messageObject }}</h4>
         
<h4 class="to">: إلى السيد</h4>



<p class="toPers">وكيل الملك لدى محكمة الإستئناف بالعيون</p>

<h4 class="one"><span style="font-weight: 700">لفائدة : </span> السيد (ة) {{ $senderName }}</h4>

<h4 class="onee">SH254879 الحامل للبطاقة الوطنية رقم</h4>

<h4 class="oneee">الساكن ب {{ $senderCity }}</h4>

<span style="font-weight: 700; position: absolute; right: 20px; top: 410px">: ضد</span>

<h4 style="font-weight: 400; position: absolute; right: 20px; top: 440px">SH658723 الحامل للبطاقة الوطنية رقم</h4>

<h4 style="font-weight: 400; position: absolute; right: 20px; top: 470px">الساكن ب {{ $senderCity }}</h4>

<span style="font-weight: 700; position: absolute; right: 20px; top: 500px">: سيدي الوكيل العام المحترم</span>


<span style="font-weight: 400; position: absolute; right: 20px; top: 530px">: أتشرف أن أعرض على أنظار جنابكم مايلي</span>


<div style="width: 97%; position: absolute; left: 50%; top: 580px; transform: translateX(-50%); text-align: right">
    <p>
        حيث انه بتاريخ...........
حوالي الساعة العاشر ليلا ، تعرضت للضرب والجرح باستعمال<br>
...........السلاح الابيض من طرف المسمى
<br>...........وحيث أن المشتكى به


<br>وحيث أن فعل المشتكى به يشكل في الزمان والمكان جنحة الضرب والجرح باستعمال السلاح<br> الابيض طبقا للفصل 400 من القانون الجنائي<br>

مما يناسب معه تسجيل الشكاية الحالية ضد المشتكى به مع إحالتها على الضابطة القضائية واتخاذ ما<br> قرونه مناسبا في شانها<br>


<span style="font-weight: 700;margin-right: 300px">: لهذه الأسباب</span>
    </p>

 
    
    لهذا السبب اطلب من سيادتكم الموقرة اتخاذ الإجراءات اللازمة والضرورية وإعطاء أوامركم<br> 
    للضابطة القضائية قصد إجراء بحث في الموضوع ومتابعة المشتكى بهما أعلاه بالمنسوب إليهما


    <br>
    ولسيادتكم واسع النظر.<br>
وتقبلوا فائق احترامي وعظيم شكري

<br>


<span style="font-weight: 700">: الامضاء</span><br>

<span style="font-weight: 700;margin-right: 60%">والسلام</span>
</div>


    </div>

    

    <button onclick="window.print()">Print</button>
</body>
</html>
