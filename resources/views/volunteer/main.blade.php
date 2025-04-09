@extends('layout.layoutvolunteer')

@section('content')

<div class="category-area">
    <h2>รายการหมวดหมู่</h2>
    @if ($categories->count() > 0)
    @php
    $categories = $categories->sortByDesc('category_mandatory');
    @endphp
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
        <button class="submit-button" onclick="sentActivityModal()"> ส่งชุดกิจกรรมทั้งหมด </button>
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
                @if($activity->users_id == auth()->id())
                <td>{{ $activity->category->category_name }}</td>
                <td>{{ $activity->activity_name }}</td>
                <td>{{ $activity->activity_status }}</td>

                <td>

                    {{-- <button class="edit-button" onclick="editActivity(this)"> แก้ไข</button>
                    <form action="{{ route('activity.delete', $activity->activity_id) }}" method="POST" style="display: inline;" id="delete-form-{{ $activity->activity_id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="logout-button" onclick="confirmDelete({{ $activity->activity_id }})"> ลบ </button>
                    </form> --}}
                    <button class="edit-button" onclick="editActivity({{ $activity->activity_id }},'{{ $activity->activity_name }}','{{ $activity->activity_description }}','{{ $activity->activity_date }}')">แก้ไข</button>
                    <button class="logout-button" onclick="deleteActivity({{ $activity->activity_id }})"> ลบ</button> 
                    <button class="view-details-button" onclick="openActivityDetailsModal(this)">ดูข้อมูลเพิ่มเติม</button>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

{{-- หน้าต่างลอยบันทึกกิจกรรม --}}
<div id="activityModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityModal()">&times;</span>
        <h2>บันทึกกิจกรรม</h2>
        <form id="activity-form" action="{{ url('/activities') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="category_id" id="category_id">
            <div class="form-group">
                <label for="activity_name">ชื่อกิจกรรม:</label>
                <input type="text" id="activity_name" name="activity_name">
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
            <button type="submit" class="submit-button">บันทึกกิจกรรม</button>
        </form>
    </div>
</div>
{{-- สิ้นสุดหน้าบันทึกกิจกรรม --}}

{{-- หน้าต่างลอยแก้ไขกิจกรรม --}}
<div id="editActivityModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeEditActivityModal()">&times;</span>
        <h2>แก้ไขบันทึกกิจกรรม</h2>
        <form id="edit-activity-form" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="activity_id" id="edit_activity_id">
            <div class="form-group">
                <label for="edit_activity_name">ชื่อกิจกรรม:</label>
                <input type="text" id="edit_activity_name" name="activity_name" required>
            </div>
            <div class="form-group">
                <label for="edit_activity_description">คำอธิบาย:</label>
                <textarea id="edit_activity_description" name="activity_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="edit_activity_image">เพิ่มรูปภาพ (สูงสุด 5 รูป):</label>
                <input type="file" id="activity_image" name="activity_image[]" accept="image/*" multiple
                    onchange="">
                <div id="images-preview"></div>
            </div>
            <div class="form-group">
                <label for="edit_activity_date">วัน/เดือน/ปี ที่ทำกิจกรรม:</label>
                <input type="date" id="edit_activity_date" name="activity_date" required>
            </div>
            <button type="submit" class="submit-button">แก้ไขกิจกรรม</button>
        </form>
    </div>
</div>
{{-- สิ้นสุดหน้าแก้ไขกิจกรรม --}}

<div id="activityDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeActivityDetailsModal()">&times;</span>
        <h2>รายละเอียดกิจกรรม</h2>
        <div id="activityDetailsContent">
        </div>
    </div>
</div>
<script>
    function confirmDelete(activityId) {
        if (confirm('คุณแน่ใจหรือไม่ว่าต้องการลบกิจกรรมนี้?')) {
            document.getElementById(`delete-form-${activityId}`).submit();
        }
    }
</script>

@endsection