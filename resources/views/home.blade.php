<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAR System</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', sans-serif;
        }

        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 240px;
            background-color: #fff;
            border-right: 1px solid #e0e0e0;
            padding: 20px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            padding: 0 20px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

        .logo span {
            margin-left: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .menu-item:hover {
            background-color: #f0f0f0;
        }

        .menu-item i {
            margin-right: 10px;
            color: #666;
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
        }

        .welcome-text {
            color: #777;
            font-size: 16px;
        }

        .user-profile {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
        }

        /* Status Tracking Styles */
        .status-section {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 20px;
            color: #444;
        }

        .progress-track {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 30px 0;
        }

        .progress-step {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .step-dot {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ddd;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .step-dot.active {
            background-color: #2563eb;
        }

        .step-line {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: #ddd;
            z-index: 1;
        }

        /* Activity List Styles */
        .activity-list {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .activity-header {
            display: grid;
            grid-template-columns: 0.5fr 2fr 1fr 1fr;
            padding: 15px 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #eee;
            font-weight: bold;
            color: #444;
        }

        .activity-row {
            display: grid;
            grid-template-columns: 0.5fr 2fr 1fr 1fr;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .activity-detail {
            color: #666;
            font-size: 12px;
            grid-column: 1 / -1;
            padding: 10px 20px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #eee;
        }

        .badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            text-align: center;
        }

        .badge-warning {
            background-color: #fff5f5;
            color: #e53e3e;
            border: 1px solid #fed7d7;
        }

        .badge-info {
            background-color: #ebf8ff;
            color: #3182ce;
            border: 1px solid #bee3f8;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            text-align: center;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
            width: 100%;
        }

        .notification-section {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .notification {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            background-color: #f59e0b;
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 14px;
        }

        .notification-text {
            font-size: 14px;
            color: #666;
            flex: 1;
        }

        .notification-btn {
            background-color: transparent;
            border: 1px solid #ddd;
            color: #666;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 20px;
        }

        .pagination-btn {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #666;
        }

        .pagination-text {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="https://via.placeholder.com/40" alt="VAR Logo">
                <span>VAR</span>
            </div>
            <a href="#" class="menu-item">
                <i>🏠</i>
                <span>หน้าหลัก</span>
            </a>
            <a href="#" class="menu-item">
                <i>✏️</i>
                <span>บันทึกของฉัน</span>
            </a>
            <a href="#" class="menu-item">
                <i>🕒</i>
                <span>ข้อมูลย้อนหลัง</span>
            </a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="welcome-text">ยินดีต้อนรับ, คุณ พชรกิจ เสริมสำราช</div>
                <div class="user-profile">👤</div>
            </div>

            <!-- Status Section -->
            <h2 class="section-title">สถานะบันทึกกิจกรรม</h2>
            <div class="status-section">
                <div class="progress-track">
                    <div class="progress-step">
                        <div class="step-label">บันทึก/แก้ไข</div>
                        <div class="step-dot active"></div>
                        <div class="step-line"></div>
                    </div>
                    <div class="progress-step">
                        <div class="step-label">ส่งบันทึก</div>
                        <div class="step-dot"></div>
                        <div class="step-line"></div>
                    </div>
                    <div class="progress-step">
                        <div class="step-label">ตรวจสอบ</div>
                        <div class="step-dot"></div>
                        <div class="step-line"></div>
                    </div>
                    <div class="progress-step">
                        <div class="step-label">อนุมัติแล้ว</div>
                        <div class="step-dot"></div>
                    </div>
                </div>
            </div>

            <!-- Notification Section -->
            <h2 class="section-title">กำหนดส่งกิจกรรม</h2>
            <div class="notification-section">
                <div class="notification">
                    <div class="notification-icon">!</div>
                    <div class="notification-text">สามารถส่งบันทึกได้ภายในวันที่ 32 มกราคม พ.ศ. 2569 และ xxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxx xx xxxxxxxxx</div>
                    <button class="notification-btn">ส่งบันทึก</button>
                </div>
            </div>

            <!-- Activity List -->
            <div class="activity-list">
                <div class="activity-header">
                    <div>ลำดับ</div>
                    <div>หมวดหมู่กิจกรรม</div>
                    <div>ประเภท</div>
                    <div>สถานะ</div>
                </div>

                <div class="activity-row">
                    <div>1</div>
                    <div>อนุรักษ์ป่า</div>
                    <div><span class="badge badge-warning">บังคับ</span></div>
                    <div><button class="btn btn-primary">สร้างบันทึก</button></div>
                </div>
                <div class="activity-detail">
                    กะเลาขนข้าวสามร้อย ย้อยความรักลามใจประเพณีงดงาม...
                </div>

                <div class="activity-row">
                    <div>2</div>
                    <div>ปลูกต้นไม้ ดูแลน้ำ</div>
                    <div><span class="badge badge-warning">บังคับ</span></div>
                    <div><button class="btn btn-primary">สร้างบันทึก</button></div>
                </div>
                <div class="activity-detail">
                    วันหนึ่งวันเดินเข้าป่า วันเวลาผ่านหนี บีบหายน้ำจะมะโปโย...
                </div>

                <div class="activity-row">
                    <div>3</div>
                    <div>อาสาภัย ช่วยเหลือพยาบาล</div>
                    <div><span class="badge badge-info">สมัครใจ</span></div>
                    <div><button class="btn btn-primary">สร้างบันทึก</button></div>
                </div>
                <div class="activity-detail">
                    ทำให้พยาบาลก็ทำความดี เฉลยเพราะว่าหมอเกรงเล่น ไปไม่...
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="pagination-btn">ย้อนกลับ</button>
                <button class="pagination-btn">ถัดไป</button>
                <span class="pagination-text">หน้า 1 / 1</span>
            </div>
        </div>
    </div>
</body>
</html>
