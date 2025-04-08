@extends('layout.layoutvolunteer')

@section('content')

<div class="category-area">
    <h2>รายการหมวดหมู่</h2>
    @if ($categories->count() > 0)
    <table class="category-table">
        <thead>
            <tr>
                <th>ชื่อหมวดหมู่</th>
                <th>รายละเอียด</th>
                <th>ประเภท</th>
                <th>ทำกิจกรรม</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description }}</td>
                <td>
                    @if ($category->category_mandatory == 1)
                    <span style="color: #FF0000;"></i>
                        *หมวดหมู่บังคับ*</span>
                    @else
                    <span style="color: gray;"></i>
                        หมวดหมู่ไม่บังคับ</span>
                    @endif
                </td>
                <td style="text-align: center;">
                    <button class="activity-button" id="activity-{{ $category->category_id }}"
                        onclick="openActivityModal({{ $category->category_id }})">ทำกิจกรรม</button>
                    <button class="edit-button" id="edit-{{ $category->category_id }}"
                        style="display: none;">แก้ไข</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>ไม่มีข้อมูลกิจกรรม</p>
    @endif
</div>
<div class="activity-area">
    <h2>รายการกิจกรรม</h2>
    <div class="submit-all-activities-area">
        <button class="submit-button" id="activity-{{ $category->category_id }}"
            onclick="sentActivityModal()">
            ส่งชุดกิจกรรมทั้งหมด
        </button>
    </div>



    <table class="activity-table" id="added-activities-table">
        <thead>
            <tr>
                <th>หมวดหมู่</th>
                <th>ชื่อกิจกรรม</th>
                <th>สถานะ</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->category_name }}</td>
                <td>{{ $activity->activity_name }}</td>
                <td>{{ $activity->activity_status }}</td>
                <td>
                    <button class="edit-button" onclick="editActivity(this)"> แก้ไข</button>
                    <button class="logout-button" onclick="deleteActivity(this)"> ลบ</button>
                    <button class="view-details-button" onclick="openActivityDetailsModal(this)">ดูข้อมูลเพิ่มเติม</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="activityModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityModal()">&times;</span>
        <h2>บันทึกกิจกรรม</h2>
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
<div id="activityDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityDetailsModal()">&times;</span>
        <h2>รายละเอียดกิจกรรม</h2>
        <div id="activityDetailsContent">
        </div>
    </div>
</div>

@endsection