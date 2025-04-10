@extends('layout.layoutcentral')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px 10px;
            vertical-align: top;
        }

        th {
            background-color: #eee;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .report-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .filter-section {
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .filter-section select,
        .filter-section input {
            padding: 5px 8px;
            font-size: 14px;
        }
    </style>
    <div class="category-area">
        <h2> รายงานบันทึกกิจกรรม</h2>
        <div class="year-filter-container">
            <p class="mb-0 me-2" style="margin: 0;">ต้องการดูของปี
                <select name="filter-year" id="filter-year" class="form-select w-auto">
                </select>
                <input type="text" name="search-name" id="search-name" class=" w-auto" placeholder="ค้นหาชื่อจังหวัด">
            </p>
            <br>
            @if (count($NestedData) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>หมวดกิจกรรม</th>
                            <th>กิจกรรม</th>
                            <th>วันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $index = 1; @endphp
                        @foreach ($NestedData as $userName => $categories)
                            @php
                                $userActivityCount = collect($categories)->flatten(1)->count();
                                $firstUser = true;
                            @endphp
                            @foreach ($categories as $categoryName => $activities)
                                @php
                                    $categoryActivityCount = count($activities);
                                    $firstCategory = true;
                                @endphp
                                @foreach ($activities as $activity)
                                    <tr>
                                        @if ($firstUser)
                                            <td rowspan="{{ $userActivityCount }}" class="text-center">{{ $index }}</td>
                                            <td rowspan="{{ $userActivityCount }}">{{ $userName }}</td>
                                            @php $firstUser = false; $index++; @endphp
                                        @endif

                                        @if ($firstCategory)
                                            <td rowspan="{{ $categoryActivityCount }}">{{ $categoryName }}</td>
                                            @php $firstCategory = false; @endphp
                                        @endif

                                        <td>{{ $activity['activity_name'] }}</td>
                                        <td class="text-center">{{ $activity['approval_date'] }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="font-size: 16px; margin-top: 20px;">ไม่มีข้อมูล</p>
            @endif
        </div>
    </div>
@endsection
