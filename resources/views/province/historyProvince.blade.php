@extends('layout.layoutprovince')

@section('content')
    <div id="history" class="activity-area">
        <h2>ข้อมูลย้อนหลังกิจกรรม จังหวัดชลบุรี</h2>

        <div class="year-filter-container">
            <label for="year-filter">ต้องการดูของปี:</label>
            <select id="year-filter">
                <option selected able value ="">ทั้งหมด</option>
                <option value ="2023">2023</option>
            </select>
                <input type="text" class="form-control" placeholder=" ค้นหารายชื่อ" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <button class="btn btn-outline-secondary" type="button">ค้นหา</button>
        </div>

        <table class="activity-table" id="history-activities-table">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>วันที่สร้างกิจกรรม</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>นายเซไค เอิร์ธ </td>
                    <td>2023-10-26</td>
                    <td><a href="vhd001" ><button class="view-details-button">ดูข้อมูลเพิ่มเติม</button></td>
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
