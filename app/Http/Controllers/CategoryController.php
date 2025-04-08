<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    //แสดงหน้า dashboard ของส่วนกลาง
    public function dashboard_central()
    {
        return view('central.dashboard');
    }

    // แสดงหน้า report ของส่วนกลาง
    public function report_central()
    {
        return view('central.report');
    }

    //แสดงหน้า checkactivity ของส่วนกลาง
    public function check_central()
    {
        return view('central.checkactivity');
    }
    public function index_central()
    {
        $categories = Category::all();
        return view('central.main', compact('categories'));
    }
    public function index_province()
    {
        $categories = Category::all();
        return view('province.main', compact('categories'));
    }
    public function index_volunteer()
    {
        $categories = Category::all();
        $activities = Activity::all();
        return view('volunteer.main', compact('categories','activities'));// ตัวอย่างการคืนค่า view
    }

    //ดึงและส่งค่า Category สำหรับ Volunteer
    //ใช้ใน VolunteerController
    public function getVolunteerCategory()
    {
        return $categories = Category::all();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'ลบหมวดหมู่สำเร็จ');
    }

    public function store(Request $request)
    {
        // ตรวจสอบ Validation ข้อมูลห้ามว่าง
        $request->validateWithBag('storeCategory', [
            'category_name' => 'required',
            'category_description' => 'required',
            'category_mandatory' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['users_id'] = Auth::id(); // กำหนด users_id เป็น ID ของผู้ใช้ปัจจุบัน
        Category::create($data);
        return redirect()->back()->with('success', 'เพิ่มหมวดหมู่สำเร็จ');
    }

    public function update(Request $request, Category $category)
    {
        // ตรวจสอบ Validation ข้อมูลห้ามว่าง
        $request->validateWithBag('updateCategory',[
            'category_name' => 'required',
            'category_description' => 'required',
            'category_mandatory' => 'required|boolean',
        ]);

        $category->update($request->all());

        return redirect()->back()->with('success', 'หมวดหมู่ถูกอัปเดตแล้ว');
    }

    
}
