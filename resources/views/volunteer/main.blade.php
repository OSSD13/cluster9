@extends('layout.layoutvolunteer')

@section('content')

    <div class="category-area">
        <h2>รายการหมวดหมู่</h2>
        @if ($categories->count() > 0)
            <table class="category-table">
                <thead>
                    <tr>
                        <th>ชื่อหมวหมู่</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
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
                                    <span style="color: green;"><i class="fas fa-check"></i>
                                        กิจกรรมนี้บังคับ</span>
                                @else
                                    <span style="color: gray;"><i class="fas fa-times"></i>
                                        กิจกรรมนี้ไม่บังคับ</span>
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
            <button class="submit-button">ส่งชุดกิจกรรมทั้งหมด</button>
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
                <tr>
                    <td>ส่งเสริมการรักชุมชน </td>
                    <td>กิจกรรมส่งเสริมวัฒนธรรมพื้นบ้าน</td>
                    <td>รอส่วนภูมิภาคตรวจสอบ</td>
                    <td>
                        <button class="edit-button">แก้ไข</button>
                        <button class="logout-button">ลบ</button>
                        <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                    </td>
                </tr>
                <tr>
                    <td>อาสาสมัครสอนหนังสือ </td>
                    <td>กิจกรรมส่งเสริมภาษาไทยพื้นบ้าน</td>
                    <td>รอส่วนกลางตรวจสอบ</td>
                    <td>
                        <button class="edit-button">แก้ไข</button>
                        <button class="logout-button">ลบ</button>
                        <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                    </td>
                </tr>
                <tr>
                    <td>ปลูกป่าเพื่อสิ่งแวดล้อม</td>
                    <td>กิจกรรม 3</td>
                    <td>รอแก้ไข</td>
                    <td>
                        <button class="edit-button">แก้ไข</button>
                        <button class="logout-button">ลบ</button>
                        <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                    </td>
                </tr>
                <tr>
                    <td>ทำความสะอาดสถานที่สาธารณะ</td>
                    <td>กิจกรรม 4</td>
                    <td>ผ่านการอนุมัติ</td>
                    <td>
                        <button class="edit-button">แก้ไข</button>
                        <button class="logout-button">ลบ</button>
                        <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
