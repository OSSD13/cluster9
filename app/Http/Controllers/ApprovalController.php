<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Approval;
use App\Models\Activity;
use App\Models\UserCluster;

class ApprovalController extends Controller
{
    // ดึงวัน/เดือน/ปี ออกมาจากการเปรียบเทียบโดย สถานะผ่านการอนุมัติ
    public function index_approval()
    {
        //ดึงข้อมูลปีที่ผ่านการอนุมัติ
        // $StatusApproval = Approval::selectRaw('YEAR(approval_date) as year')
        // ->where('approval_status', 'ผ่านการอนุมัติ')
        // ->distinct()
        // ->orderBy('year', 'desc')
        // ->get();
        // return view('central.report', compact('StatusApproval'));

        //ดึงข้อมูลจากตาราง users, activities, approvals
        $UserApproval = DB::table('var_users')
            ->join('var_activities', 'user_id', '=', 'var_activities.users_id')
            ->join('var_approvals', 'activity_id', '=', 'var_approvals.activities_id')
            ->where('user_role', 'V')
            ->where('approval_status', 'ผ่านการอนุมัติ')
            ->select(
                'user_nameth',
                'activity_name',
                'approval_date',
                'var_activities.categories_id'
            )
            ->get()
            ->transform(fn($i) => (array)$i)
            ->toArray();

        //ดึง categories แยก
        $PullCategory = DB::table('var_categories')->get()
            ->transform(fn($i) => (array)$i)
            ->toArray();

        //สร้าง map category_id => category_name
        $NameCategory = [];
        foreach ($PullCategory as $cat) {
            $NameCategory[$cat['category_id']] = $cat['category_name'];
        }

        //จัดรูปข้อมูลตามต้องการ
        $NestedData = [];

        foreach ($UserApproval as $item) {
            $user = $item['user_nameth'];
            $cat_id = $item['categories_id'];
            $cat_name = $NameCategory[$cat_id] ?? 'ไม่ทราบหมวดหมู่';

            if (!isset($NestedData[$user])) {
                $NestedData[$user] = [];
            }

            if (!isset($NestedData[$user][$cat_name])) {
                $NestedData[$user][$cat_name] = [];
            }

            array_push($NestedData[$user][$cat_name], [
                'activity_name' => $item['activity_name'],
                'approval_date' => \Carbon\Carbon::parse($item['approval_date'])->locale('th')->translatedFormat('j M Y')
            ]);

        }

        //ทดสอบดูข้อมูล
        //dd($NestedData);

        //ส่งข้อมูลไป view
        return view('central.report', compact('NestedData'));
    }

    public function index_approvalProvince()
    {
        $UserApproval = DB::table('var_users')
            ->join('var_activities', 'user_id', '=', 'var_activities.users_id')
            ->join('var_approvals', 'activity_id', '=', 'var_approvals.activities_id')
            ->where('user_role', 'V')
            ->where('approval_status', 'ผ่านการอนุมัติ')
            ->select(
                'user_nameth',
                'activity_name',
                'approval_date',
                'var_activities.categories_id'
            )
            ->get()
            ->transform(fn($i) => (array)$i)
            ->toArray();

        //ดึง categories แยก
        $PullCategory = DB::table('var_categories')->get()
            ->transform(fn($i) => (array)$i)
            ->toArray();

        //สร้าง map category_id => category_name
        $NameCategory = [];
        foreach ($PullCategory as $cat) {
            $NameCategory[$cat['category_id']] = $cat['category_name'];
        }

        //จัดรูปข้อมูลตามต้องการ
        $NestedData = [];

        foreach ($UserApproval as $item) {
            $user = $item['user_nameth'];
            $cat_id = $item['categories_id'];
            $cat_name = $NameCategory[$cat_id] ?? 'ไม่ทราบหมวดหมู่';

            if (!isset($NestedData[$user])) {
                $NestedData[$user] = [];
            }

            if (!isset($NestedData[$user][$cat_name])) {
                $NestedData[$user][$cat_name] = [];
            }

            array_push($NestedData[$user][$cat_name], [
                'activity_name' => $item['activity_name'],
                'approval_date' => \Carbon\Carbon::parse($item['approval_date'])->locale('th')->translatedFormat('j M Y')
            ]);

        }

        //ทดสอบดูข้อมูล
        //dd($NestedData);

        //ส่งข้อมูลไป view
        return view('province.report', compact('NestedData'));
    }
        // ->orderBy('approval_date', 'desc')
        // ->get();
        // dd($UserApproval);
        // ->join('var_activities', 'var_activities.users_id', '=', 'var_users.user_id');
        // return view('central.report', compact('UserApproval'));

    //จอยตารางเพื่อดึงค่ามาแสดงในหน้า Report
    // public function index_UserApproval(){
    //     $UserApproval = DB::table('var_users')
    //     ->join('var_categories', 'user_id', '=', 'var_categories.users_id')
    //     ->join('var_activities', 'category_id', '=', 'var_activities.categories_id')
    //     ->join('var_approvals', 'activity_id', '=', 'var_approvals.approval_id')
    //     ->where('approval_status', 'ผ่านการอนุมัติ')
    //     ->select('user_nameth',
    //             'category_name',
    //             'activity_name',
    //             'approval_date')
    //     ->orderBy('approval_date', 'desc')
    //     ->get();
    //     return view('central.report', compact('UserApproval'));
    // }
}
