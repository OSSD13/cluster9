@extends('layout.layoutcentral')

@section('content')

<div class="category-area">
    <div style="margin-bottom: 20px;">
        <h2>เพิ่มหมวดหมู่ใหม่</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">ชื่อหมวดหมู่:</label>
                <input type="text" id="category_name" name="category_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_description">รายละเอียด:</label>
                <textarea id="category_description" name="category_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="category_mandatory">สถานะ:</label>
                <select id="category_mandatory" name="category_mandatory" class="form-control" required>
                    <option value="1">บังคับ</option>
                    <option value="0">ไม่บังคับ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">เพิ่มหมวดหมู่</button>
        </form>
    </div>

    <h2>รายการหมวดหมู่</h2>
    @if ($categories->count() > 0)
        @php
            $categories = $categories->sortByDesc('category_mandatory');
        @endphp
        <div class="category-table-container">
            <table class="category-table">
                <thead>
                    <tr>
                        <th style="width: 15%;">ชื่อหมวดหมู่</th>
                        <th style="width: 55%;">รายละเอียด</th>
                        <th style="width: 15%;">ประเภท</th>
                        <th style="width: 15%;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>
                                @if ($category->category_mandatory == 1)
                                    <span style="color: #FF0000;">
                                        *หมวดหมู่บังคับ*
                                    </span>
                                @else
                                    <span style="color: gray;">
                                        หมวดหมู่ไม่บังคับ
                                    </span>
                                @endif
                            </td>
                            <td style="text-align: center;">
                                <button class="edit-button"
                                    onclick="openEditModal({{ $category->category_id }}, '{{ $category->category_name }}', '{{ $category->category_description }}', {{ $category->category_mandatory }})">แก้ไข</button>
                                <form action="{{ route('categories.destroy', $category->category_id) }}"
                                    method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบหมวดหมู่นี้?')">ลบ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>ไม่มีข้อมูลหมวดหมู่</p>
    @endif
</div>

@endsection
