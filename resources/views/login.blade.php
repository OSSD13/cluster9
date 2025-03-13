<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body,
        html {
            height: 100vh;
            margin: 0;
            font-family: 'Prompt', sans-serif;
        }

        .container-fluid {
            height: 100vh;
            display: flex;
        }

        .left-panel {
            width: 60%;
            height: 100%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .right-panel {
            width: 40%;
            height: 100%;
            /* เพิ่มให้ขยายเต็มจอ */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            background: linear-gradient(to bottom, #2B15EF, #251992);
        }

        .login-container {
            width: 80%;
            /* เพิ่มความกว้างของฟอร์ม */
            max-width: 500px;
            /* จำกัดขนาดสูงสุด */
        }

        h3 {
            font-size: 30px;
            /* เพิ่มขนาดหัวข้อ */
            margin-top: 10px;
            /* เพิ่มระยะห่างด้านบน */
        }

        p {
            font-size: 20px;
        }

        h5 {
            font-size: 15px;
        }

        .form-label {
            font-size: 1.2rem;
            /* ขยายขนาดตัวอักษรของ label */
        }

        .form-control {
            font-size: 1.2rem;
            /* ขยายขนาดช่องกรอกข้อมูล */
            padding: 0.8rem;
            /* เพิ่ม padding เพื่อให้ช่องกรอกข้อมูลใหญ่ขึ้น */
        }

        .input-group-text {
            font-size: 1.5rem;
            /* ขยายขนาดไอคอน */
        }

        .btn {
            font-size: 1.2rem;
            /* ขยายขนาดปุ่ม */
            padding: 1rem;
            /* เพิ่ม padding ของปุ่ม */
            background: linear-gradient(to left, #251992, #2B15EF);
            color: white;
        }

        .form-check-label {
            font-size: 1.1rem;
            /* ขยายขนาดตัวอักษรของ checkbox label */
        }

        .right-panel h1 {
            font-size: 60px;
            margin-top: 650px;
        }

        .container {
          width: 80%;  /* แทนที่จะใช้ 800px */
          margin: auto;
        }


    </style>
</head>

<body>
    <div class="d-flex w-100">
        <div class="d-flex justify-content-center align-items-center" style="width: 60%;">
            <div class="login-container">
                <h3 class="mb-4">ลงชื่อเข้าใช้งาน</h3>
                <label class="form-label">
                    <h5>ชื่อผู้ใช้งาน</h5>
                </label>
                <input type="text" class="form-control mb-3">
                <label class="form-label">
                    <h5>รหัสผ่าน</h5>
                </label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control">

                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        <h5>จดจำฉัน</h5>
                    </label>
                </div>
                <button class="btn w-100">เข้าสู่ระบบ</button>
            </div>
        </div>
        <div class="right-panel d-flex flex-column justify-content-start text-center" style="width: 40%;">
            <h1>บันทึกกิจกรรมจิตอาสา</h1>
            <p>เพื่อช่วยให้สามารถติดตามและ</p>
            <p>ประเมินผลการดำเนินกิจกรรมต่าง ๆ</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
