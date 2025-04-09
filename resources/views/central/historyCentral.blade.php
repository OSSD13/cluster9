@extends('layout.layoutcentral')

@section('content')
    <div id="history" class="activity-area">
        <h2>ข้อมูลย้อนหลังกิจกรรม </h2>
        <div class="year-filter-container">

                <input type="text"  placeholder=" ค้นหาจังหวัด" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button  type="button">ค้นหา</button>
        </div>
        <table class="activity-table" id="history-activities-table">
            <thead>
                <tr>
                    <th>จังหวัด</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ชลบุรี </td>
                    <td><a href="{{ url('/categories/historySheet')}}" ><button class="view-details-button">ดูข้อมูล</button></td>
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
