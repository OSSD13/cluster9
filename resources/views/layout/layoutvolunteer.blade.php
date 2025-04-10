<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VAR System</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Prompt', sans-serif;
    }

    body {
        background-color: #f5f5f5;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    .sidebar {
        width: 200px;
        background-color: #fff;
        border-right: 1px solid #e0e0e0;
        padding: 20px 0;
    }

    .logo {
        padding: 0 20px;
        margin-bottom: 20px;
    }

    .menu-item {
        padding: 12px 20px;
        margin-bottom: 5px;
        color: #333;
        text-decoration: none;
        display: block;
        line-height: 1.5;
        vertical-align: middle;
        transition: background-color 0.3s ease;
        border-bottom: 1px solid #eee;
        font-size: 16px;
        font-weight: 500;
    }

    .menu-item:hover {
        background-color: #f0f0f0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .main-content {
        flex: 1;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 22px 20px;
        border-bottom: 1px solid #e0e0e0;

    }

    .main-body {
        padding: 20px;
    }

    .user-profile {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #eee;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ddd;
    }

    .logout-button {
        background-color: #f44336;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .logout-button:hover {
        background-color: #d32f2f;
    }

    .category-area {
        margin-top: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .category-table {
        width: 100%;
        border-collapse: collapse;
    }

    .category-table th,
    .category-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .category-table th {
        background-color: #f2f2f2;
    }

    .activity-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .activity-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #f9f9f9;
        margin: 10% auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 80%;
        max-width: 600px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form-group input[type="file"] {
        padding: 0;
    }

    .form-group select {
        appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="currentColor" viewBox="0 0 4 5" xmlns="http://www.w3.org/2000/svg"><path d="M2 0L0 2h4zm0 5L0 3h4z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 10px top 50%;
        padding-right: 30px;
    }

    .form-group textarea {
        resize: vertical;
    }

    .form-group .image-preview {
        width: 150px;
        height: 150px;
        border: 1px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .form-group .image-preview img {
        max-width: 100%;
        max-height: 100%;
    }

    .submit-button {
        background-color: #007bff;
        color: white;
        padding: 14px 25px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        width: 100%;
    }

    .submit-button:hover {
        background-color: #0056b3;
    }

    .activity-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .activity-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .edit-button {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .edit-button:hover {
        background-color: #0056b3;
    }

    .activity-area {
        margin-top: 20px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        /* เพิ่ม position: relative; เพื่อให้ปุ่มจัดวางแบบ absolute ได้ */
    }

    .activity-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        /* เพิ่ม margin-top เพื่อเว้นระยะห่างจากปุ่ม */
    }

    .activity-table th,
    .activity-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .activity-table th {
        background-color: #f2f2f2;
    }

    .activity-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .activity-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .delete-button {
        background-color: #f44336;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #d32f2f;
    }

    .delete-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .edit-button {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .edit-button:hover {
        background-color: #0056b3;
    }

    .edit-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .view-button {
        background-color: #008CBA;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .view-button:hover {
        background-color: #0077A3;
    }

    .view-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    .activity-table td:last-child {
        white-space: nowrap;
        /* ป้องกันการขึ้นบรรทัดใหม่ */
        width: 1%;
        /* กำหนดความกว้างให้พอดีกับเนื้อหา */
    }

    .tab-button {
        background-color: #f0f0f0;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-right: 5px;
    }

    .tab-button.active {
        background-color: #ddd;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .year-filter-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .year-filter-container label {
        margin-right: 10px;
    }

    .sent-all-activities-area .sent-button {
        background-color: #7d39d6;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .activity-detail {
        margin-top: 20px;
    }

    .activity-detail p {
        margin: 10px 0;
    }

    .label {
        font-weight: bold;
    }

    .images {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .image-box {
        width: 80px;
        height: 80px;
        background-color: #ddd;
        border-radius: 4px;
    }

    .year-filter-container select {
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .sent-all-activities-area {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: 10px;
    }



    .sent-all-activities-area .sent-button {
        background-color: #7d39d6;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .sent-all-activities-area .sent-button:hover {
        background-color: #d32f2f;
    }

    .sent-all-activities-area .sent-button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img style="width: 70px; heigh: 70px;" src="{{ asset('public/assets/picture/logo.png') }}"
                    alt="Website Logo">
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

            <a href="#" class="menu-item" onclick="showCategories()">
                <i class="fas fa-home"></i> หน้าหลัก
            </a>
            <a href="#" class="menu-item" onclick="showHistory()">
                <i class="fas fa-history"></i> ข้อมูลย้อนหลัง
            </a>
        </div>
        <div class="main-content">
            <div class="header">
                @if (Auth::check())
                <div class="welcome-text">ยินดีต้อนรับ, คุณ
                    {{ Auth::user()->user_nameth }}
                </div>
                @else
                <div class="welcome-text">ยินดีต้อนรับ, ผู้เยี่ยมชม</div>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">ออกจากระบบ</button>
                </form>
            </div>
            <div class="main-body">
                @yield('content')
            </div>
        </div>
    </div>
    <script>
        function showCategories() {
            window.location.href = "{{ route('vcategories') }}";
        }

        function showHistory() {
            window.location.href = "{{ route('history_volunteer') }}";
        }
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const tab = this.getAttribute('data-tab');
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                document.getElementById(tab).classList.add('active');
            });
        });
        var modal = document.getElementById("activityModal");

        function openActivityModal(categoryId) {

            modal.style.display = "block";
            document.getElementById('activity-form').action = '/activities/' + categoryId;
            document.getElementById('category_id').value = categoryId;
            document.getElementById('activity_name').value = '';
            document.getElementById('activity_description').value = '';
            document.getElementById('submit-activity-button').disabled = false;

        }

        function closeActivityModal() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function previewImages(event) {
            var files = event.target.files;
            var imagesPreview = document.getElementById('images-preview');
            imagesPreview.innerHTML = '';

            if (files.length > 5) {
                alert("คุณสามารถเลือกรูปภาพได้สูงสุด 5 รูปเท่านั้น");
                return;
            }

            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.marginRight = '10px';
                    imagesPreview.appendChild(img);
                }
                reader.readAsDataURL(files[i]);
            }
        }

        function doActivity(categoryId) {
            document.getElementById('activity-' + categoryId).disabled = true;
            document.getElementById('activity-' + categoryId).innerText = "ทำแล้ว";
            document.getElementById('edit-' + categoryId).style.display = "inline-block";
        }
        var addedActivities = [];

        function addActivityToTable(categoryId, categoryName, activityName, activityDescription) {
            var table = document.getElementById('added-activities-table').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = categoryName;
            cell2.innerHTML = activityName;
            cell2.innerHTML = activityDescription;

            // สร้างสถานะแบบ random
            var statuses = ["รอส่วนภูมิภาคตรวจสอบ", "รอส่วนกลางตรวจสอบ", "รอแก้ไข", "ผ่านการอนุมัติ"];
            var randomStatus = statuses[Math.floor(Math.random() * statuses.length)];
            cell3.innerHTML = randomStatus;

            cell4.innerHTML =
                '<button class="edit-button">แก้ไข</button> <button class="logout-button">ลบ</button> <button class="view-details-button">ดูข้อมูลเพิ่มเติม</button>';

            addedActivities.push({
                categoryId: categoryId,
                activityName: activityName,
                activityDescription: activityDescription,
                status: randomStatus
            });
        }

        // document.getElementById('activity-form').addEventListener('submit', function(event) {
        //     //event.preventDefault();
        //     var categoryId = document.getElementById('category_id').value;
        //     var categoryName = document.querySelector('#activity-' + categoryId).closest('tr').cells[0].textContent;
        //     var activityName = document.getElementById('activity_name').value;
        //     var activityDescription = document.getElementById('activity_description').value;

        //     addActivityToTable(categoryId, categoryName, activityName, activityDescription);
        //     closeActivityModal();
        // });

        var activityDetailsModal = document.getElementById("activityDetailsModal");

        function openActivityDetailsModal(row) {
            var category = row.cells[0].textContent;
            var activityName = row.cells[1].textContent;
            var activityDate = row.cells[2].textContent;

            var detailsContent = document.getElementById("activityDetailsContent");
            detailsContent.innerHTML = `
        <p><strong>ชื่อกิจกรรม:</strong> ${activityName}</p>
        <p><strong>หมวดหมู่กิจกรรม:</strong> ${category}</p>
        <p><strong>วันที่ทำกิจกรรม:</strong> ${activityDate}</p>
        `;

            activityDetailsModal.style.display = "block";
        }

        function closeActivityDetailsModal() {
            activityDetailsModal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == activityDetailsModal) {
                activityDetailsModal.style.display = "none";
            }
        }

    /*function deleteActivity(activity_id) {
            Swal.fire({
                title: "ยืนยันที่จะลบบันทึกกิจกรรมหรือไม่",
                //text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#007BFF",
                cancelButtonColor: "#F44336",
                confirmButtonText: "ยืนยัน",
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var row = button.closest("tr");
                    row.remove();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        }*/

       //เพิ่มใหม่
        function deleteActivity(activity_id) {
    Swal.fire({
        title: "ยืนยันที่จะลบบันทึกกิจกรรมหรือไม่?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007BFF",
        cancelButtonColor: "#F44336",
        confirmButtonText: "ยืนยัน",
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {
            // สร้าง form ขึ้นมาแบบชั่วคราวเพื่อส่งคำสั่งลบ
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/cluster9/home/volunteer/${activity_id}`;
            form.style.display = 'none';

            // เพิ่ม CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            // เพิ่ม method spoofing สำหรับ DELETE
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();
        }
    });




        function sentActivityModal(status) {
            Swal.fire({
                title: "คุณต้องการส่งชุดกิจกรรมทั้งหมดใช่หรือไม่?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "ใช่, ส่งเลย",
                denyButtonText: "ไม่ส่ง"
            }).then((result) => {
                if (result.isConfirmed) {
                    // แสดงผลลัพธ์การส่ง
                    Swal.fire("ส่งสำเร็จ!", "", "success");
                    if (status == 'รอการตรวจสอบ') { // ปิดปุ่มทั้งหมด
                        const activityButtons = document.querySelectorAll(".activity-button");
                        activityButtons.forEach(btn => btn.disabled = true);

                        const editButtons = document.querySelectorAll(".edit-button");
                        editButtons.forEach(btn => btn.disabled = true);

                        const submitButtons = document.querySelectorAll(".submit-button");
                        submitButtons.forEach(btn => btn.disabled = true);

                        const deleteButtons = document.querySelectorAll(".delete-button");
                        deleteButtons.forEach(btn => btn.disabled = true);
                        const viewButtons = document.querySelectorAll(".view-button");
                        viewButtons.forEach(btn => btn.disabled = true);

                        const sentButtons = document.querySelectorAll(".sent-button");
                        sentButtons.forEach(btn => btn.disabled = true);

                    }
                } else if (result.isDenied) {
                    Swal.fire("ยกเลิกการส่งแล้ว", "", "info");
                }
            });
        }



        function editActivity(button) {
            var row = button.closest("tr");
            var category = row.cells[0].textContent.trim();
            var activityName = row.cells[1].textContent.trim();
            var activityDate = row.cells[2].textContent.trim();
            var description = row.cells[3].textContent.trim();
            var imageSrc = row.querySelector('img') ? row.querySelector('img').src : "";
            openActivityModal();

            document.getElementById("activity_name").value = activityName;
            document.getElementById("activity_description").value = description;
            document.getElementById("activity_date").value = activityDate;

            var imagePreview = document.getElementById("image-preview");
            imagePreview.innerHTML = '';
            if (imageSrc) {
                var imgElement = document.createElement('img');
                imgElement.src = imageSrc;
                imgElement.style.maxWidth = '100px';
                imgElement.style.maxHeight = '100px';
                imagePreview.appendChild(imgElement);
            }
            document.getElementById("category_id").value = category;
        }
        //เรียกหน้าต่างลอยหน้าแก้ไขกิจกรรม
        function editActivity(id, name, description, date) {
            const modal = document.getElementById('editActivityModal');
            modal.style.display = 'block';
            document.getElementById('edit_activity_name').value = name;
            document.getElementById('edit_activity_description').value = description;
            document.getElementById('edit_activity_date').value = date;
            const form = document.getElementById('edit-activity-form');
            form.action = `/cluster9/home/volunteer/${id}`;
        }

        //ปิดหน้าต่างลอยหน้าแก้ไขกิจกรรม
        function closeEditActivityModal(){
            editActivityModal.style.display = "none";
        }

        // เพิ่ม Event Listener ให้กับปุ่ม "ดูข้อมูลเพิ่มเติม"
        document.getElementById('history-activities-table').addEventListener('click', function(event) {
            if (event.target.classList.contains('view-details-button')) {
                var row = event.target.closest('tr');
                openActivityDetailsModal(row);
            }
        });
    </script>
</body>

</html>
