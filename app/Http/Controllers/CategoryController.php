<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
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
        $data = $request->all();
        $data['users_id'] = Auth::id(); // กำหนด users_id เป็น ID ของผู้ใช้ปัจจุบัน
        Category::create($data);
        return redirect()->back()->with('success', 'เพิ่มหมวดหมู่สำเร็จ');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required',
            'category_mandatory' => 'required|boolean',
        ]);

        $category->update($request->all());

        return redirect()->back()->with('success', 'หมวดหมู่ถูกอัปเดตแล้ว');
    }
}
