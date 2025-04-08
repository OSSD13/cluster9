@extends('layout.layoutcentral')

@section('content')
<div id="history" class="activity-area">
    <h2>ตรวจสอบกิจกรรม</h2>
    <div class="year-filter-container">
        <input type="text"  placeholder=" ค้นหาจังหวัด " aria-label="Recipient's username"
            aria-describedby="basic-addon2">
        <button type="button"> ค้นหา</button>
    </div>

    <table class="activity-table" id="check-activities-table">
        <thead>
            <tr>
                <th>จังหวัด</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ชลบุรี</td>
                <td><a href="{{ url('/categories/checkSheetCentral') }}"><button class="view-details-button">ตรวจสอบ</button></td>
            </tr>
        </tbody>
    @endsection
</table>
</div>
