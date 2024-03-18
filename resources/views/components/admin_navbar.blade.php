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
</head>
<body>
      <div class="navbarDiv" style="height: 70px">
        <div class="navbarDivOne">
            @auth
            <form action={{ route('admin.logout') }} method="POST">
              @csrf
              <div class="logoutDiv">
                <button type="submit"><i class='bx bx-log-out-circle ii'></i>تسجيل الخروج</button>
                <a href="{{ route('dashboard') }}" style="text-decoration: none"><i class='bx bxs-dashboard iiD'></i>لوحة التحكم</a>
              </div>
            </form>
            @endauth
        </div>
        <div class="navbarDivTwo">
          <ul class="navbar-ull">
            <li><a href="{{ route('settings.show') }}"><i class='bx bx-cog' style='color:#ffffff'  ></i> الإعدادات</a></li>
            @if (auth()->user()->role === 'admin')
            <li>
              <a href="{{ route('demande.index') }}" style="display: flex; align-items: center; gap: 5px">
                  @if ($countt > 0)
                      <span style="color: #ffc221">({{ $countt }})</span> <i class='bx bx-envelope'></i>طلبات الغياب
                  @else
                  <i class='bx bx-envelope'></i>
                 طلبات الغياب
                  @endif
              </a>
          </li>
              <li>
                <a href="{{ route('listWaitingEmployees') }}" style="display: flex; align-items: center; gap: 5px">
                    @if ($count > 0)
                        <span style="color: #ffc221">({{ $count }})</span> <i class='bx bx-envelope'></i>لائحة الموظفين
                    @else
                    <i class='bx bx-table'></i>
                        لائحة الموظفين
                    @endif
                </a>
            </li>
            <li><a href="{{ route('presence.list') }}"><i class='bx bxs-bell-plus' style='color:#ffffff'  ></i> لائحة الحظور</a></li>
            @endif
            @if (auth()->user()->role === 'employe')

            <li><a href="{{ route('list.demande') }}" style="display: flex; align-items: center; gap: 5px"><i class='bx bxs-bookmarks' style='color:#ffffff'  ></i>قائمة الطلبات</a></li>





            <li><a href={{ route('demande.show') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-edit-alt' style='color:#ffffff'  ></i>طلب غياب</a></li>
            <li><a href={{ route('message.gestion') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-table'></i>تدبير الواردات</a></li>
            <li><a href={{ route('message.index') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-envelope'></i>لائحة الواردات</a></li>
            <li><a href={{ route('message.add') }} style="display: flex; align-items: center; gap: 5px"><i class='bx bx-add-to-queue'></i>إظافة واردة</a></li>
            @endif
            <li><a href="/"><i class='bx bxs-home' style='color:#dee2e6;background: #ffbc2b; padding: 14px 10px'></i></a></li>
            
            
          </ul>
      </div>
      </div>
</body>
</html>


