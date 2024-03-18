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


        
        @if (session()->has('demandeAccepted'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "{{ session('demandeAccepted') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif


        @if (session()->has('demandeRefused'))
            <script>
                Swal.fire({
                    position: "center-center",
                    icon: "error",
                    title: "{{ session('demandeRefused') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif
        
          <div class="searchResultWaiting">
            <p>تمكنكم هذه الواجهة من الإطلاع على طلبات الغياب الخاصة بالموظفين، ويمكنكم قبول أو رفض هذه الطلبات على مستوى المحكمة الإستئنافية بالعيون<br><span>.واجهة خاصة بالموظفين تحت مسمى وظيفي رئيس</span></p>
          </div>


          <div class="theResult">
            
            <span class="suivie">لائحة الموظفين</span>
          </div>

        <div class="tableDiv">
            <table border="1" class="messages-table">
                <tr>
                    <th>وضعية الطلب</th>
                    <th>الموافقة على الطلب</th>
                    <th>رفض الطلب</th>
                    <th>السبب</th>
                    <th>إلى</th>
                    <th>من</th>
                    <th>إسم الموظف</th>
                </tr>
                @foreach ($demandes as $dem)
                    <tr class="messageRow">
                            @if ($dem->status === 'under review')
                                <td><span style="color: #ffbc2b">قيد الإنتظار</span></td>
                            @endif

                            @if ($dem->status === 'accepted')
                                <td><span style="color: #088772">تم قبول الطلب</span></td>
                            @endif

                            @if ($dem->status === 'refused')
                                <td><span style="color: #f44336">تم رفض الطلب</span></td>
                            @endif
                        @if ($dem->status === 'under review')
                            <td>
                                <form action="{{ route('demande.accept', $dem->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="acceptDemande">✓</button></form>
                            </td>
                            <td>
                                <form action="{{ route('demande.refuse', $dem->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cancelDemande"><i class='bx bx-x'></i></button>
                                </form>
                            </td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                        <td>{{ $dem->reason }}</td>
                        <td>{{ $dem->date_to }}</td>
                        <td>{{ $dem->date_from }}</td>
                        <td>{{ $dem->employe_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <x-foo_ter/>
    
    
</body>
</html>