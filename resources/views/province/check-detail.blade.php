@extends('layout.layoutprovince')

@section('content')
    <div id="history">
        <div class="activity-area">
            <a href="{{ url('/categories/checkActivityProvince') }}"><button class="view-backward-button">◀
                    ย้อนกลับ</button></a>

            <h2 style="margin-top: 1%"> ตรวจสอบกิจกรรมของนายเซไค เอิร์ธ</h2>
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
                            <button class="view-details-button" onclick="openActivityModal()">ดูข้อมูลเพิ่มเติม</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
                    <p><span class="label">รายละเอียด</span>
                        นำวัฒนธรรมพื้นบ้านของชาวบ้านมาจัดแสดงให้แก่นักท่องเที่ยวได้เห็น</p>
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
                <div class="modal-footer">
                    <span class="btn btn-confirm" onclick="closeActivityModal()">อนุมัติ</span>
                    <span class="btn btn-cancel" onclick="openDeclineModal()" onclick="closeActivityModal()">ไม่อนุมัติ</span>
                </div>
        </div>
        </form>
    </div>

    <div id="declineModal" class="modal">
        <div class="modal-content">
            <h2 style="text-align: center;">เหตุผลที่ไม่อนุมัติกิจกรรม</h2>
            <textarea style="margin-top : 2%" placeholder="กรอกเหตุผลที่ไม่อนุมัติกิจกรรม"></textarea>
            <div class="modal-footer">
                <span class="btn btn-confirm" onclick="closeModal()">ยืนยัน</span>
                <span class="btn btn-cancel" onclick="closeDeclineModal()">ยกเลิก</span>
            </div>
        </div>
    </div>
@endsection
