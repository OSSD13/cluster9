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
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 22px 20px;
            border-bottom: 1px solid #e0e0e0;

        }

        .main-body {
            padding: 20px;
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

        .activity-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .activity-button:disabled {
            background-color: #cccccc;
            color: #666666;
            cursor: not-allowed;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #f9f9f9;
            margin: 10% auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .form-group input[type="file"] {
            padding: 0;
        }

        .form-group select {
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 4 5" xmlns="http://www.w3.org/2000/svg"><path d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            padding-right: 30px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group .image-preview {
            width: 150px;
            height: 150px;
            border: 1px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .form-group .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }

        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 14px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .activity-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .activity-button:disabled {
            background-color: #cccccc;
            color: #666666;
            cursor: not-allowed;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .activity-area {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            /* เพิ่ม position: relative; เพื่อให้ปุ่มจัดวางแบบ absolute ได้ */
        }

        .activity-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            /* เพิ่ม margin-top เพื่อเว้นระยะห่างจากปุ่ม */
        }

        .activity-table th,
        .activity-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .activity-table th {
            background-color: #f2f2f2;
        }

        .activity-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .activity-button:disabled {
            background-color: #cccccc;
            color: #666666;
            cursor: not-allowed;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .view-details-button {
            background-color: #008CBA;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .view-details-button:hover {
            background-color: #0077A3;
        }

        .activity-table td:last-child {
            white-space: nowrap;
            /* ป้องกันการขึ้นบรรทัดใหม่ */
            width: 1%;
            /* กำหนดความกว้างให้พอดีกับเนื้อหา */
        }

        .tab-button {
            background-color: #f0f0f0;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 5px;
        }

        .tab-button.active {
            background-color: #ddd;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .year-filter-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .year-filter-container label {
            margin-right: 10px;
        }

        .year-filter-container select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .submit-all-activities-area {
            position: absolute;
            top: 10px;
            right: 10px;
            margin-right: 10px;
        }

        .submit-all-activities-area .submit-button:hover {
            background-color: #d32f2f;
        }

        .submit-all-activities-area .submit-button {
            background-color: #7d39d6;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img style="width: 70px; heigh: 70px;" src="{{asset('public/assets/picture/logo.png')}}"  alt="Website Logo">
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

            <a href="#" class="menu-item" onclick="showCategories()">
                <i class="fas fa-home"></i> หน้าหลัก
            </a>
            <a href="#" class="menu-item" onclick="showHistory()">
                <i class="fas fa-history"></i> ข้อมูลย้อนหลัง
            </a>
        </div>
        <div class="main-content">
            <div class="header">
                @if (Auth::check())
                    <div class="welcome-text">ยินดีต้อนรับ, คุณ
                        {{ Auth::user()->user_nameth }}</div>
                @else
                    <div class="welcome-text">ยินดีต้อนรับ, ผู้เยี่ยมชม</div>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">ออกจากระบบ</button>
                </form>
            </div>
            <div class="main-body">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        function showCategories() {
            window.location.href = "{{ route('vcategories') }}";
        }

        function showHistory() {
            window.location.href = "{{ route('history') }}";
        }
    </script>
</body>

</html>
