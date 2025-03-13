<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะบันทึกกิจกรรม</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background: #f4f4f4;
            padding: 20px;
            height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .status-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .status-bar span {
            padding: 10px;
            background: #ddd;
            border-radius: 5px;
        }
        .status-bar .active {
            background: blue;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .mandatory {
            color: red;
            font-weight: bold;
        }
        .optional {
            color: orange;
            font-weight: bold;
        }
        .save {
            background: blue;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>VAR</h2>
        <ul>
            <li><a href="#">หน้าหลัก</a></li>
            <li><a href="#">บันทึกของฉัน</a></li>
            <li><a href="#">ข้อมูลย้อนหลัง</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>ยินดีต้อนรับ, คุณ พชรกิจ เสริมสำราญ</h1>
        <h2>สถานะบันทึกกิจกรรม</h2>
        <div class="status-bar">
            <span class="active">บันทึก/แก้ไข</span>
            <span>ส่งบันทึก</span>
            <span>ตรวจสอบ</span>
            <span>อนุมัติแล้ว</span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>หมวดหมู่กิจกรรม</th>
                    <th>ประเภท</th>
                    <th>สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>อนุรักษ์ทะเล</td>
                    <td><span class="mandatory">บังคับ</span></td>
                    <td><button class="save">สร้างบันทึก</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>ปลูกต้นไม้ ดูแลป่า</td>
                    <td><span class="mandatory">บังคับ</span></td>
                    <td><button class="save">สร้างบันทึก</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>อาสากู้ภัย ช่วยเหลือพยาบาล</td>
                    <td><span class="optional">สมัครใจ</span></td>
                    <td><button class="save">สร้างบันทึก</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
