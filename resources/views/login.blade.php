<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body,
        html {
            height: 100vh;
            font-family: 'Prompt', sans-serif;
            background: white ;
        }

        .login-card {
            max-width: 400px; /* ลดขนาด card ให้ดู compact ขึ้น */
            width: 100%;
            padding: 0;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* เพิ่มเงาให้ดูมีมิติ */
            overflow: hidden; /* ป้องกัน content ล้น */
        }

        .top-panel {
            background: linear-gradient(to right, #2B15EF, #251992);
            color: white;
            padding: 1.5rem; /* เพิ่ม padding ให้ดูสบายตา */
            text-align: center;
        }

        .form-container {
            padding: 2rem;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .btn-custom {
            background: linear-gradient(to left, #251992, #2B15EF);
            color: white;
            padding: 0.8rem 1.2rem; /* ปรับ padding ปุ่ม */
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            transition: transform 0.2s ease-in-out; /* เพิ่ม transition ให้ปุ่ม */
        }

        .btn-custom:hover {
            transform: translateY(-2px); /* ยกปุ่มขึ้นเล็กน้อยเมื่อ hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เพิ่มเงาเมื่อ hover */
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.7rem;
        }

        .form-control:focus {
            border-color: #2B15EF;
            box-shadow: 0 0 0 0.25rem rgba(43, 21, 239, 0.25);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="login-card">
        <div class="top-panel">
            <h1 class="fs-4 mb-0">บันทึกกิจกรรมจิตอาสา</h1>
        </div>
        <div class="form-container">
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <h4 class="mb-4 text-center">ลงชื่อเข้าใช้งาน</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">รหัสผ่าน</label>
                    <input type="password" class="form-control" name="user_password" required>
                </div>
                <button type="submit" class="btn btn-custom w-100">เข้าสู่ระบบ</button>
            </form>
        </div>
    </div>
</body>

</html>

