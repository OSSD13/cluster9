@extends('layout.layoutprovince')

@section('content')
    <div id="history" class="activity-area">
        <div class="submit-all-activities-area">
            <button class="submit-button">ส่งชุดกิจกรรมทั้งหมด</button>
        </div>
        <h2>ตรวจสอบกิจกรรม</h2>
        <div class="year-filter-container">
            <input type="text" placeholder=" ค้นหารายชื่อ" aria-label="Recipient's username"
                aria-describedby="basic-addon2">
            <button type="button">ค้นหา</button>
        </div>

        <table class="activity-table" id="check-activities-table">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>วันที่ส่งกิจกรรม</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>นายเซไค เอิร์ธ </td>
                    <td>2023-10-26</td>
                    <td><a href="vcd001"><button class="view-details-button">ตรวจสอบ</button></td>
                </tr>
            </tbody>
        @endsection
    </table>
</div>

<script>
    function showDetail() {
        document.getElementById('showDetail').style.display = 'block'
    }
</script>
