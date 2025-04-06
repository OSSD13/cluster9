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
            <tr>
                <td>ส่งเสริมการรักชุมชน </td>
                <td>กิจกรรมส่งเสริมวัฒนธรรมพื้นบ้าน</td>
                <td>2023-10-26</td>
                <td>
                    <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                </td>
            </tr>
            <tr>
                <td>อาสาสมัครสอนหนังสือ </td>
                <td>กิจกรรมส่งเสริมภาษาไทยพื้นบ้าน</td>
                <td>2023-10-25</td>
                @foreach ($categories as $category)
                <td style="text-align: center;">
                    <button class="view-details-button" id="activity-{{ $category->category_id }}"
                        onclick="openActivityModal({{ $category->category_id }})">ดูข้อมูลเพิ่มเติม</button>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
<div id="activityModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityModal()">&times;</span>
        <h2>รายละเอียดกิจกรรม</h2>
        <form id="activity-form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" id="category_id">
            <div class="form-group">
                <label for="activity_name">ชื่อกิจกรรม:</label>
                <input type="text" id="activity_name" name="activity_name" required>
            </div>

            <div class="form-group">
                <label for="activity_description">คำอธิบาย:</label>
                <textarea id="activity_description" name="activity_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="activity_image">เพิ่มรูปภาพ (สูงสุด 5 รูป):</label>
                <input type="file" id="activity_image" name="activity_image[]" accept="image/*" multiple
                    onchange="previewImages(event)">
                <div id="images-preview"></div>
            </div>
            <div class="form-group">
                <label for="activity_date">วัน/เดือน/ปี ที่ทำกิจกรรม:</label>
                <input type="date" id="activity_date" name="activity_date" required>
            </div>
            <button type="submit" class="submit-button">บันทึกรายงาน</button>
        </form>
    </div>
</div>
@endsection