<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="listMessages-section">
        <x-landing-section_head />

        <x-admin_navbar :count="count($waitingEmploye)" />
        
          <div class="messageInfos">
            <span class="suivie">البحث عن الواردات</span>
          </div>
          <div class="searchResult">
            <p>تمكنكم هذه الواجهة من الإطلاع و البحث على الواردات، الإدارية، التجارية بما فيها الشكايات والمحاضر، بما في ذلك الإطلاع على مآل الشكايات على مستوى <br>.المحكمة الإستئنافية بالعيون</p>
<div style="color: #f44336; font-size: 18px; padding: 30px 0">المرجو منكم إدخال الرقم الكامل للواردة/الشكاية أولا، ليتم تحميل لائحة الواردات أوتوماتيكيا وبعد ذلك يمكنكم اختيار الواردة</div>



            <div class="searchField">

<div></div>
                <div class="searchBtn"><button onclick="search()">بحث</button></div>

                <div><label for="" class="searchN">إسم المرسِل</label></div>
                <div class="searchName">
                    <input type="text" id="senderNameInput" placeholder="إسم المرسِل">
                </div>

                <div>
                    <label for="" class="searchC">موطن المرسِل</label></div>
                <div class="searchCity">
                    <input type="text" id="senderCity" placeholder="موطن المرسِل">
                </div>
    
                <div>
                    <label for="" class="searchN">رقم الرسالة</label></div>
                <div class="searchNumber">
                    <input type="text" id="messageNumber" placeholder="رقم الرسالة">
                </div>
                
            </div>
          </div>



          <div class="theResult">
            <span class="suivie">نتيجة البحث</span>
          </div>
        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>طباعة</th>
                    <th>الموضوع</th>
                    <th>موطنه</th>
                    <th>إسم المرسِل</th>
                    <th>تاريخ الوصول</th>
                    <th>رقمها</th>
                    <th>تاريخ الرسالة</th>
                    <th>الرقم الترتيبي</th>
                    
                </tr>
                @foreach ($messages as $mess)
                    <tr class="messageRow">
                        <td>
                            <form action="{{ route('download.pdf') }}" method="POST">
                                @csrf
                                <input type="hidden" name="sender_name" value="{{ $mess->sender_name }}">
                                <input type="hidden" name="message_object" value="{{ $mess->message_object }}">
                                <input type="hidden" value="{{ $mess->sender_city }}" name="sender_city">
                                <input type="hidden" name="message_number" value="{{ $mess->message_number }}">
                                <input type="hidden" name="message_date" value="{{ $mess->message_date }}">
                                <button type="submit" class="press">طبع</button>
                            </form>
                        </td>
                        <td>{{ $mess->message_object }}</td>
                        <td>{{ $mess->sender_city }}</td>
                        <td>{{ $mess->sender_name }}</td>
                        <td>{{ $mess->received_date }}</td>
                        <td>{{ $mess->message_number }}</td>
                        <td>{{ $mess->message_date }}</td>
                        <td>{{ $mess->id }}</td>
                        
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <x-foo_ter/>
    <script>
        
        function search() {
            var senderName = document.getElementById('senderNameInput').value.trim().toLowerCase();
            var senderCity = document.getElementById('senderCity').value.trim().toLowerCase()
            var messageNumber = document.getElementById('messageNumber').value.trim().toLowerCase()
            
            var rows = document.getElementsByClassName('messageRow');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var senderNameCell = row.getElementsByTagName('td')[3];
                var senderCityCell = row.getElementsByTagName('td')[2];
                var messageNumberCell = row.getElementsByTagName('td')[5];
                

                if (senderNameCell.textContent.trim().toLowerCase().includes(senderName) && senderCityCell.textContent.trim().toLowerCase().includes(senderCity) && messageNumberCell.textContent.trim().toLowerCase().includes(messageNumber)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }


    </script>
    <script src="/js/main.js"></script>
    
</body>
</html>