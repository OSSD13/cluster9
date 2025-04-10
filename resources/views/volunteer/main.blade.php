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
    <div class="sent-all-activities-area">
        <?php $act = $activities[0];
        $act_state = $act->activity_status;
        ?>
        <button class="sent-button" onclick="sentActivityModal('{{ $act_state }}')">
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
                    @if($activity->activity_status == 'รอการแก้ไข')
                    <button class="edit-button" onclick="editActivity(this)"> แก้ไข</button>
                    <button class="delete-button" onclick="deleteActivity(this)"> ลบ</button>
                    <button class="view-button" onclick="openActivityDetailsModal(this)">ดูข้อมูลเพิ่มเติม</button>
                    @else
                    <button class="edit-button" onclick="editActivity(this)"> แก้ไข</button>
                    <button class="delete-button" onclick="deleteActivity(this)"> ลบ</button>
                    <button class="view-button" onclick="openActivityDetailsModal(this)">ดูข้อมูลเพิ่มเติม</button>
                    @endif
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
<script>
    $(document).ready(function() {
            // Get PHP variable into JavaScript
            var actState = "<?php echo $act_state; ?>";

            // Check its value
            if (actState === "รอตรวจสอบ") {
                const activityButtons = document.querySelectorAll(".activity-button");
                activityButtons.forEach(btn => btn.disabled = true);

                const editButtons = document.querySelectorAll(".edit-button");
                editButtons.forEach(btn => btn.disabled = true);

                const submitButtons = document.querySelectorAll(".submit-button");
                submitButtons.forEach(btn => btn.disabled = true);

                const deleteButtons = document.querySelectorAll(".delete-button");
                deleteButtons.forEach(btn => btn.disabled = true);
                const viewButtons = document.querySelectorAll(".view-button");
                viewButtons.forEach(btn => btn.disabled = true);

                const sentButtons = document.querySelectorAll(".sent-button");
                sentButtons.forEach(btn => btn.disabled = true);
            } else if (actState === "รอแก้ไข") {
                const activityButtons = document.querySelectorAll(".activity-button");
                activityButtons.forEach(btn => btn.disabled = true);

                const editButtons = document.querySelectorAll(".edit-button");
                editButtons.forEach(btn => btn.disabled = false);

                const submitButtons = document.querySelectorAll(".submit-button");
                submitButtons.forEach(btn => btn.disabled = false);

                const deleteButtons = document.querySelectorAll(".delete-button");
                deleteButtons.forEach(btn => btn.disabled = false);
                const viewButtons = document.querySelectorAll(".view-button");
                viewButtons.forEach(btn => btn.disabled = false);

                const sentButtons = document.querySelectorAll(".sent-button");
                sentButtons.forEach(btn => btn.disabled = false);
            }
            else if (actState === "กำลังเดินการ") {
                const activityButtons = document.querySelectorAll(".activity-button");
                activityButtons.forEach(btn => btn.disabled = false);

                const editButtons = document.querySelectorAll(".edit-button");
                editButtons.forEach(btn => btn.disabled = false);

                const submitButtons = document.querySelectorAll(".submit-button");
                submitButtons.forEach(btn => btn.disabled = false);

                const deleteButtons = document.querySelectorAll(".delete-button");
                deleteButtons.forEach(btn => btn.disabled = false);
                const viewButtons = document.querySelectorAll(".view-button");
                viewButtons.forEach(btn => btn.disabled = false);

                const sentButtons = document.querySelectorAll(".sent-button");
                sentButtons.forEach(btn => btn.disabled = false);
            }
        });
</script>
@endsection