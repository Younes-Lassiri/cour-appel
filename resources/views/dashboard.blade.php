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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if (session()->has('demandeAdded'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('demandeAdded') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif



    @if (session()->has('status'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('status') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    

    @if (session()->has('settings'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('settings') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif



    <x-landing-section_head />
    <x-admin_navbar :count="count($waitingEmploye)" :countt="count($waitingDemande)" />

    @if (session()->has('success'))
        <script>
            Swal.fire({
                position: "center-center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif


<div class="messageInfos">
    <span class="suivie">لائحة الواردات و الصادرات</span>
  </div>
  <div class="searchResult">
    <p>تمكنكم هذه الواجهة من الإطلاع و البحث على الواردات وكذلك الصادرات المتعلقة بهذه الواردات، الإدارية، التجارية بما فيها الشكايات والمحاضر، بما في ذلك الإطلاع على مآل الشكايات على مستوى <br>.المحكمة الإستئنافية بالعيون</p>
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
            <th>النتيجة</th>
            <th>المصدر و الجواب</th>
            <th>تاريخ الصادرة</th>
            <th>الموضوع</th>
            <th>موطنه</th>
            <th>إسم المرسِل</th>
            <th>تاريخ الوصول</th>
            <th>رقمها</th>
            <th>تاريخ الرسالة</th>
            <th>الرقم الترتيبي</th>
        </tr>
        @foreach ($messages as $mess)
    @php
        $response = $responses->where('message_id', $mess->id)->first();
    @endphp
    <tr class="messageRow">
        @if ($response)
            <td>{{ $response->result }}</td>
            <td>{{ $response->response }}</td>
            <td>{{ explode(' ', $response->created_at)[0] }}</td>
        @else
            <td></td>
            <td></td>
            <td></td>
        @endif
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



@auth
    @if (auth()->user()->role === 'employe')
        @php
            $hasPresenceRecords = $presences->isNotEmpty();
            $isButtonAvailable = !$hasPresenceRecords || !$presences->first()->time_in->isToday();
            $lastPresence = $presences->first();
            $hasSetTimeOutToday = $lastPresence && $lastPresence->time_out && $lastPresence->time_out->isToday();
        @endphp

        @if ($isButtonAvailable)
            <div style="position: fixed; bottom: 30px; left: 30px">
                <form action="{{ route('presence.register') }}" method="post">
                    @csrf
                    <button type="submit" class="presenceButtons"><i class='bx bx-log-in-circle' style='color:#003566'  ></i></button>
                </form>
            </div>
        @endif

        @if (!$isButtonAvailable && !$hasSetTimeOutToday)
            <div style="position: fixed; bottom: 30px; left: 30px; z-index: 1000">
                <form action="{{ route('presence.timeout') }}" method="post">
                    @csrf
                    <button type="submit" class="presenceButtons"><i class='bx bx-log-out-circle' style='color:#003566'></i></button>
                </form>
            </div>
        @endif
    @endif
@endauth







<x-foo_ter/>


<script>
        
    function search() {
        var senderName = document.getElementById('senderNameInput').value.trim().toLowerCase();
        var senderCity = document.getElementById('senderCity').value.trim().toLowerCase()
        var messageNumber = document.getElementById('messageNumber').value.trim().toLowerCase()
        
        var rows = document.getElementsByClassName('messageRow');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var senderNameCell = row.getElementsByTagName('td')[5];
            var senderCityCell = row.getElementsByTagName('td')[4];
            var messageNumberCell = row.getElementsByTagName('td')[7];
            

            if (senderNameCell.textContent.trim().toLowerCase().includes(senderName) && senderCityCell.textContent.trim().toLowerCase().includes(senderCity) && messageNumberCell.textContent.trim().toLowerCase().includes(messageNumber)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }


</script>

</body>
</html>