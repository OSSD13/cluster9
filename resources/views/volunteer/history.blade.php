@extends('layout.layoutvolunteer')

@section('content')
<div id="history" class="activity-area">
    <h2>ข้อมูลย้อนหลังกิจกรรม</h2>
    <div class="year-filter-container">
        <label for="year-filter">ต้องการดูของปี:</label>
        <select id="year-filter">
            <option value="">ทั้งหมด</option>
        </select>
    </div>
    <table class="activity-table" id="history-activities-table">
        <thead>
            <tr>
                <th>หมวดหมู่</th>
                <th>ชื่อกิจกรรม</th>
                <th>วันที่สร้างกิจกรรม</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_activity_name }}</td>
                <td>{{ $category->category_activity_create_at }}</td>

                <td style="text-align: center;">
                    <button class="view-details-button" id="activity-{{ $category->category_id }}"
                        onclick="openActivityModal({{ $category->category_id }})">ดูข้อมูลเพิ่มเติม</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="activityModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityModal()">&times;</span>
        <h2 style="text-align: center;">รายละเอียดกิจกรรม</h2>
        <form id="activity-form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" id="category_id">
            <br>
            <div class="activity-detail">
                <p><span class="label">ชื่อกิจกรรม</span> &nbsp;กิจกรรมส่งเสริมวัฒนธรรมพื้นบ้าน</p>
                <p><span class="label">หมวดหมู่</span> &nbsp;ส่งเสริมการรักษ์ชุมชน</p>
                <p><span class="label">ประเภท</span> บังคับ</p>
                <p><span class="label">รายละเอียด</span> นำวัฒนธรรมพื้นบ้านของชาวบ้านมาจัดแสดงให้แก่นักท่องเที่ยวได้เห็น</p>
                <p><span class="label">รูปภาพ</span></p>
                <div class="images">
                    <div class="image-box"><img src="your-image.jpg" class="image-box" /></div>
                    <div class="image-box"></div>
                    <div class="image-box"></div>
                    <div class="image-box"></div>
                    <div class="image-box"></div>
                </div>
                <p style="margin-top: 20px;"><span class="label">วันที่บันทึกกิจกรรม</span> : 26 / 10 / 2566</p>
            </div>
        </form>
    </div>
</div>
@endsection