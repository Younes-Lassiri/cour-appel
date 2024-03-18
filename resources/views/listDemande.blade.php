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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="listMessages-section">
        
        <x-landing-section_head />

        <x-admin_navbar :count="count($waitingEmploye)" :countt="count($waitingDemande)" />
        
          <div class="searchResultWaiting">
            <p>تمكنكم هذه الواجهة من الإطلاع على وظعية طلبات الغياب الخاصة بك<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي موظف</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة الطلبات</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>وضعية الطلب</th>
                    <th>السبب</th>
                    <th>إلى</th>
                    <th>من</th>
                    <th>رقم الطلب</th>
                </tr>
                @foreach ($listDemande as $liDem)
                    <tr class="messageRow">
                            @if ($liDem->status === 'under review')
                                <td><span class="demandeWaiting">قيد الإنتظار</span></td>
                            @endif

                            @if ($liDem->status === 'accepted')
                                <td><span class="demandeAccepted">تم قبول الطلب</span></td>
                            @endif
                        
                            @if ($liDem->status === 'refused')
                                <td><span class="demandeRefused">تم رفض الطلب</span></td>
                            @endif
                        <td>{{ $liDem->reason }}</td>
                        <td>{{ $liDem->date_to }}</td>
                        <td>{{ $liDem->date_from }}</td>
                        <td>{{ $liDem->employe_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <x-foo_ter/>
    
    
</body>
</html>