@extends('layout.layoutcentral')

@section('content')

    <style>
        .is-invalid {
            border: 1px solid red !important;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .action-buttons button {
            margin-right: 5px;
        }

        .disabled-button {
            background-color: #929292 !important;
            color: #ffffff !important;
            border: 1px solid #8b8686 !important;
            cursor: not-allowed !important;
        }

        .category-table-container {
            overflow-x: auto;
            /* เพิ่ม scroll เมื่อหน้าจอเล็ก */
        }

        .category-table {
            width: 100%;
            border-collapse: collapse;
        }

        .category-table th,
        .category-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .category-table th {
            background-color: #f4f4f4;
        }

        @media (max-width: 768px) {

            .category-table th,
            .category-table td {
                font-size: 0.875em;
                /* ลดขนาดฟอนต์ */
                padding: 8px;
            }

<style>
    .is-invalid {
        border: 1px solid red !important;
    }

    .invalid-feedback {
        color: red;
        font-size: 0.875em;
        margin-top: 5px;
    }

    .action-buttons button {
        margin-right: 5px;
    }

    .disabled-button {
        background-color: #929292 !important;
        color: #ffffff !important;
        border: 1px solid #8b8686 !important;
        cursor: not-allowed !important;
    }
</style>

<div class="category-area">
    <div style="margin-bottom: 20px;">
        <h2>เพิ่มหมวดหมู่ใหม่</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">ชื่อหมวดหมู่:</label>
                <input type="text" id="category_name" name="category_name" class="form-control {{ $errors->storeCategory->has('category_name') ? 'is-invalid' : '' }}" value="{{ old('category_name') }}">
                @error('category_name', 'storeCategory')
                    <div class="invalid-feedback">
                        กรุณากรอกชื่อหมวดหมู่
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_description">รายละเอียด:</label>
                <textarea id="category_description" name="category_description" class="form-control {{ $errors->storeCategory->has('category_description') ? 'is-invalid' : '' }}">{{ old('category_description') }}</textarea>
                @error('category_description', 'storeCategory')
                    <div class="invalid-feedback">
                        กรุณากรอกรายละเอียดหมวดหมู่
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_mandatory">สถานะ:</label>
                <select id="category_mandatory" name="category_mandatory" class="form-control {{ $errors->storeCategory->has('category_mandatory') ? 'is-invalid' : '' }}">
                    <option value="1" {{ old('category_mandatory') == '1' ? 'selected' : '' }}>บังคับ</option>
                    <option value="0" {{ old('category_mandatory') == '0' ? 'selected' : '' }}>ไม่บังคับ</option>
                </select>
                @error('category_mandatory', 'storeCategory')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">เพิ่มหมวดหมู่</button>
        </form>
    </div>

            .category-table th:nth-child(1),
            .category-table td:nth-child(1) {
                width: 30%;
                /* ปรับขนาดคอลัมน์ */
            }

            .category-table th:nth-child(2),
            .category-table td:nth-child(2) {
                width: 40%;
            }

            .category-table th:nth-child(3),
            .category-table td:nth-child(3),
            .category-table th:nth-child(4),
            .category-table td:nth-child(4) {
                width: 15%;
            }
        }
    </style>

    <div class="category-area">
        <div style="margin-bottom: 20px;">
            <h2>เพิ่มหมวดหมู่ใหม่</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_name">ชื่อหมวดหมู่:</label>
                    <input type="text" id="category_name" name="category_name"
                        class="form-control {{ $errors->storeCategory->has('category_name') ? 'is-invalid' : '' }}"
                        value="{{ old('category_name') }}">
                    @error('category_name', 'storeCategory')
                        <div class="invalid-feedback">
                            กรุณากรอกชื่อหมวดหมู่
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_description">รายละเอียด:</label>
                    <textarea id="category_description" name="category_description"
                        class="form-control {{ $errors->storeCategory->has('category_description') ? 'is-invalid' : '' }}">{{ old('category_description') }}</textarea>
                    @error('category_description', 'storeCategory')
                        <div class="invalid-feedback">
                            กรุณากรอกรายละเอียดหมวดหมู่
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_mandatory">สถานะ:</label>
                    <select id="category_mandatory" name="category_mandatory"
                        class="form-control {{ $errors->storeCategory->has('category_mandatory') ? 'is-invalid' : '' }}">
                        <option value="1" {{ old('category_mandatory') == '1' ? 'selected' : '' }}>บังคับ</option>
                        <option value="0" {{ old('category_mandatory') == '0' ? 'selected' : '' }}>ไม่บังคับ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">เพิ่มหมวดหมู่</button>
            </form>
        </div>

        <h2>รายการหมวดหมู่</h2>
        @if ($categories->count() > 0)
            @php
                $categories = $categories->sortBy([
                    fn($a, $b) => $b->is_referenced <=> $a->is_referenced, // Sort by is_referenced (enabled first)
                    fn($a, $b) => $b->category_mandatory <=> $a->category_mandatory, // Then by category_mandatory
                ]);
            @endphp
            <div class="category-table-container">
                <table class="category-table">
                    <thead>
                        <tr>
                            <th>ชื่อหมวดหมู่</th>
                            <th>รายละเอียด</th>
                            <th>ประเภท</th>
                            <th style="width: 15%">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>
                                <td>
                                    @if ($category->category_mandatory == 1)
                                        <span style="color: #FF0000;">*หมวดหมู่บังคับ*</span>
                                    @else
                                        <span style="color: gray;">หมวดหมู่ไม่บังคับ</span>
                                    @endif
                                </td>
                                <td style="text-align: center;" class="action-buttons">
                                    <button class="edit-button {{ $category->is_referenced == 0 ? 'disabled-button' : '' }}"
                                        onclick="openEditModal({{ $category->category_id }}, '{{ $category->category_name }}', '{{ $category->category_description }}', {{ $category->category_mandatory }})"
                                        {{ $category->is_referenced == 0 ? 'disabled' : '' }}>แก้ไข</button>
                                    <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm {{ $category->is_referenced == 0 ? 'disabled-button' : '' }}"
                                            onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบหมวดหมู่นี้?')"
                                            {{ $category->is_referenced == 0 ? 'disabled' : '' }}>ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>แก้ไขหมวดหมู่</h2>
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category_id" value="{{ old('category_id') }}">
                    <div class="form-group">
                        <label for="edit_category_name">ชื่อหมวดหมู่:</label>
                        <input type="text" id="edit_category_name" name="category_name" class="form-control {{ $errors->updateCategory->has('category_name') ? 'is-invalid' : '' }}" value="{{ old('category_name') }}">
                        @error('category_name', 'updateCategory')
                            <div class="invalid-feedback">
                                กรุณากรอกชื่อหมวดหมู่
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit_category_description">รายละเอียด:</label>
                        <textarea id="edit_category_description" name="category_description" class="form-control {{ $errors->updateCategory->has('category_description') ? 'is-invalid' : '' }}">{{ old('category_description') }}</textarea>
                        @error('category_description', 'updateCategory')
                            <div class="invalid-feedback">
                                กรุณากรอกรายละเอียดหมวดหมู่
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit_category_mandatory">ประเภท:</label>
                        <select id="edit_category_mandatory" name="category_mandatory" class="form-control {{ $errors->updateCategory->has('category_mandatory') ? 'is-invalid' : '' }}">
                            <option value="1" {{ old('category_mandatory') == '1' ? 'selected' : '' }}>บังคับ</option>
                            <option value="0" {{ old('category_mandatory') == '0' ? 'selected' : '' }}>ไม่บังคับ</option>
                        </select>
                        @error('category_mandatory', 'updateCategory')
                            <div class="invalid-feedback">
                                กรุณาเลือกประเภทหมวดหมู่
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">อัปเดตหมวดหมู่</button>
                </form>
            </div>
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeEditModal()">&times;</span>
                    <h2>แก้ไขหมวดหมู่</h2>
                    <form id="edit-form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="category_id" value="{{ old('category_id') }}">
                        <div class="form-group">
                            <label for="edit_category_name">ชื่อหมวดหมู่:</label>
                            <input type="text" id="edit_category_name" name="category_name"
                                class="form-control {{ $errors->updateCategory->has('category_name') ? 'is-invalid' : '' }}"
                                value="{{ old('category_name') }}">
                            @error('category_name', 'updateCategory')
                                <div class="invalid-feedback">
                                    กรุณากรอกชื่อหมวดหมู่
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_category_description">รายละเอียด:</label>
                            <textarea id="edit_category_description" name="category_description"
                                class="form-control {{ $errors->updateCategory->has('category_description') ? 'is-invalid' : '' }}">{{ old('category_description') }}</textarea>
                            @error('category_description', 'updateCategory')
                                <div class="invalid-feedback">
                                    กรุณากรอกรายละเอียดหมวดหมู่
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="edit_category_mandatory">ประเภท:</label>
                            <select id="edit_category_mandatory" name="category_mandatory"
                                class="form-control {{ $errors->updateCategory->has('category_mandatory') ? 'is-invalid' : '' }}">
                                <option value="1" {{ old('category_mandatory') == '1' ? 'selected' : '' }}>บังคับ
                                </option>
                                <option value="0" {{ old('category_mandatory') == '0' ? 'selected' : '' }}>ไม่บังคับ
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">อัปเดตหมวดหมู่</button>
                    </form>
                </div>
            </div>
        @else
            <p>ไม่มีข้อมูลหมวดหมู่</p>
        @endif
    </div>

    <script>
        var modal = document.getElementById("editModal");

        function openEditModal(categoryId, categoryName, categoryDescription, categoryMandatory) {
            modal.style.display = "block";
            document.getElementById('edit-form').action = `{{ route('categories.update', ':id') }}`.replace(':id',
                categoryId);
            document.getElementById('edit_category_name').value = categoryName;
            document.getElementById('edit_category_description').value = categoryDescription;
            document.getElementById('edit_category_mandatory').value = categoryMandatory;
        }

        function closeEditModal() {
            modal.style.display = "none";

            // ลบข้อความที่กรอก
            document.getElementById('edit_category_name').value = '';
            document.getElementById('edit_category_description').value = '';
            document.getElementById('edit_category_mandatory').value = '';

            // ลบขอบ error แดงๆ
            document.getElementById('edit_category_name').classList.remove('is-invalid');
            document.getElementById('edit_category_description').classList.remove('is-invalid');
            document.getElementById('edit_category_mandatory').classList.remove('is-invalid');

            // ลบ ข้อความerror
            const errorMessages = document.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(function(message) {
                message.innerHTML = '';
            });
        }

        //ปิดหน้าต่างแก้ไขหมวดหมู่
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // ถ้ามี error ในการแก้ไขหมวดหมู่ ตย.ในกรณีที่ปิดหน้าต่างแก้ไขลงไปแบบยังมีค่าว่าง มันจะดึงค่าเก่าที่เคยใส่ไว้อยู่
        @if ($errors->updateCategory->any())
            document.addEventListener('DOMContentLoaded', function() {
                openEditModal(
                    {{ old('category_id') ?? 'null' }},
                    "{{ old('category_name') }}",
                    "{{ old('category_description') }}",
                    {{ old('category_mandatory') ?? 'null' }}
                );
            });
        @endif
    </script>

@endsection
