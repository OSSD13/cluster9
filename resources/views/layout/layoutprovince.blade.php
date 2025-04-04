<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAR System</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 200px;
            background-color: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
        }

        .logo {
            padding: 0 20px;
            margin-bottom: 20px;
        }

        .menu-item {
            padding: 12px 20px;
            margin-bottom: 5px;
            color: #333;
            text-decoration: none;
            display: block;
            line-height: 1.5;
            vertical-align: middle;
            transition: background-color 0.3s ease;
            border-bottom: 1px solid #eee;
            font-size: 16px;
            font-weight: 500;
        }

        .menu-item:hover {
            background-color: #f0f0f0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .user-profile {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
        }

        .logout-button {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }

        .category-area {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
        }

        .category-table th,
        .category-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .category-table th {
            background-color: #f2f2f2;
        }

        .activity-check-area {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .activity-check-table {
            width: 100%;
            border-collapse: collapse;
        }

        .activity-check-table th,
        .activity-check-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .activity-check-table th {
            background-color: #f2f2f2;
        }

        .check-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .check-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <span>VAR</span>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

            <a href="#" class="menu-item" onclick="showCategories()">
                <i class="fas fa-home"></i> หน้าหลัก
            </a>
            <a href="#" class="menu-item" onclick="showActivities()">
                <i class="fas fa-tasks"></i> ตรวจสอบกิจกรรม
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-history"></i> ข้อมูลย้อนหลัง
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i> รายงานกิจกรรม
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i> Dashboard
            </a>

        </div>
        <div class="main-content">
            <div class="header">
                @if (Auth::check())
                <div class="welcome-text">ยินดีต้อนรับ, คุณ
                    {{ Auth::user()->user_name }}</div>
                @else
                <div class="welcome-text">ยินดีต้อนรับ, ผู้เยี่ยมชม</div>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">ออกจากระบบ</button>
                </form>
            </div>
            @yield('content')
        </div>
    </div>
    <script>
        function showCategories() {
            window.location.href = "{{ route('pcategories') }}";
        }
    </script>
</body>

</html>
