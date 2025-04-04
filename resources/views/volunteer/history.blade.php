@extends('layout.layoutvolunteer')

@section('content')

<div id="history" class="tab-content">
    <div class="activity-area">
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
                    <td>
                        <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
