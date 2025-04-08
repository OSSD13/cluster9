@extends('layout.layoutprovince')

@section('content')

<div class="dashboard">
    <!-- กราฟจำนวนอาสาสมัคร -->
    <div class="card">
      <div class="top-row">
        <h3>จำนวนอาสาสมัครในจังหวัดที่เข้าร่วมในแต่ละปี</h3>
        <select class="dropdown">
          <option>7 อันดับ</option>
          <option>5 อันดับ</option>
        </select>
      </div>
      <div class="bar-container">
        <div class="bar" style="height: 85%;">170</div>
        <div class="bar" style="height: 55%;">110</div>
        <div class="bar" style="height: 100%;">200</div>
        <div class="bar" style="height: 50%;">100</div>
        <div class="bar" style="height: 30%;">60</div>
        <div class="bar" style="height: 65%;">130</div>
        <div class="bar" style="height: 82%;">165</div>
      </div>
      <div class="bar-labels">
        <span>2560</span><span>2561</span><span>2562</span><span>2563</span><span>2564</span><span>2565</span><span>2566</span>
      </div>
    </div>

    <!-- ส่วนล่าง -->
    <div class="section-row">
      <!-- หมวดหมู่ยอดนิยม (กราฟ) -->
      <div class="card">
        <h3>หมวดหมู่กิจกรรมยอดนิยม 5 อันดับ ในจังหวัด ประจำปี</h3>
        <div class="bar-container">
          <div class="bar" style="height: 35%;">7</div>
          <div class="bar" style="height: 45%;">9</div>
          <div class="bar" style="height: 75%;">15</div>
          <div class="bar" style="height: 90%;">18</div>
          <div class="bar" style="height: 100%;">20</div>
        </div>
      </div>

      <!-- รายชื่อกิจกรรมยอดนิยม -->
      <div class="card">
        <h3>รายชื่อหมวดหมู่ยอดนิยม</h3>
        <ol class="popular-list">
          <li>อนุรักษ์สิ่งแวดล้อม</li>
          <li>ทำความสะอาดที่สาธารณะ</li>
          <li>ปลูกป่าเพื่อสิ่งแวดล้อม</li>
          <li>ส่งเสริมการศึกษาชุมชน</li>
          <li>ช่วยเหลือสัตว์โลก</li>
        </ol>
      </div>
    </div>
  </div>
</body>


@endsection
