<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory; // ✅ เพิ่ม trait นี้เข้าไป

    protected $fillable = ['title', 'content', 'status']; // ✅ เพิ่มถ้ายังไม่มี
}
