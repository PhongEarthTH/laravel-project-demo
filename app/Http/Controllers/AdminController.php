<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $blogs = Blog::paginate(5);
        return view('blog', compact('blogs'));
    }

    function create()
    {
        return view('form');
    }

    function insert(Request $request){
        $request->validate(
            [
            'title' => 'required|max:50',
            'content' => 'required',
            ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ]
        );
        $data=[
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => now(),
        ];
        Blog::insert($data);
        return redirect('author/blog');
    }
    
    function delete($id)
    {
        Blog::find($id)->delete();

        // นับจำนวนข้อมูลทั้งหมดหลังลบ
        $total = Blog::count();
        $perPage = 5;
        $lastPage = ceil($total / $perPage);

        // ดึงหน้าปัจจุบันจาก query string (ถ้ามี)
        $currentPage = request()->get('page', 1);

        // ถ้าหน้าปัจจุบันมากกว่าหน้าสุดท้าย ให้ redirect ไปหน้าสุดท้าย
        if ($currentPage > $lastPage && $lastPage > 0) {
            return redirect()->route('blog', ['page' => $lastPage]);
        }

        return redirect()->back();
    }

    function change($id)
    {
        $blog=Blog::find($id);
        $data=[
            'status' =>!$blog->status
        ];
        $blog=Blog::find($id)->update($data);
        return redirect()->back(); //แสดงหน้าล่าสุดเมื่อเสร็จสิ้น
    }

    function edit($id)
    {
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }

    function update(Request $request, $id){
        $request->validate(
            [
            'title' => 'required|max:50',
            'content' => 'required',
            ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            ]
        );
        $data=[
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => now(),
        ];
        Blog::find($id)->update($data); 
        // กลับไปยังหน้าที่มา (ถ้ามี page ใน query string ให้ redirect กลับไปหน้านั้น)
        $page = $request->input('page', 1);
        return redirect()->route('blog', ['page' => $page]);
    }
}
