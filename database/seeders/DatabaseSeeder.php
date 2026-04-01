<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Product;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed students
        Student::create([
            'name' => 'Nguyễn Văn A',
            'major' => 'Công nghệ thông tin',
            'email' => 'nguyenvana@example.com'
        ]);

        Student::create([
            'name' => 'Trần Thị B',
            'major' => 'Quản trị kinh doanh',
            'email' => 'tranthib@example.com'
        ]);

        // Seed products
        Product::create([
            'name' => 'Laptop Dell XPS',
            'price' => 25000000,
            'quantity' => 10,
            'category' => 'Điện tử'
        ]);

        Product::create([
            'name' => 'Chuột Logitech',
            'price' => 500000,
            'quantity' => 3,
            'category' => 'Phụ kiện'
        ]);

        Product::create([
            'name' => 'Bàn phím cơ',
            'price' => 1500000,
            'quantity' => 0,
            'category' => 'Phụ kiện'
        ]);

        // Seed courses
        Course::create([
            'name' => 'Lập trình Web',
            'credits' => 3
        ]);

        Course::create([
            'name' => 'Cơ sở dữ liệu',
            'credits' => 4
        ]);

        Course::create([
            'name' => 'Lập trình Java',
            'credits' => 3
        ]);
    }
}