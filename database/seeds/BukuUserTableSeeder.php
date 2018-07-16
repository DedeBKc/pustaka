<?php

use Illuminate\Database\Seeder;

class BukuUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BukuUser::insert([
	      [
	          'nim' => '39578934',
	          'isbn' => '978-602-1371-17-6',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '39578934',
	          'isbn' => '978-979-8559-89-2',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '39578934',
	          'isbn' => '978-979-016-775-9',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '39578934',
	          'isbn' => '978-602-364-209-0',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '89982918',
	          'isbn' => '978-602-364-209-0',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '89982918',
	          'isbn' => '978-602-17817-2-2',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '11020192',
	          'isbn' => '978-602-7847-10-1',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '11020192',
	          'isbn' => '978-602-14341-9-2',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '11020192',
	          'isbn' => '978-602-7709-19-5',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '38829222',
	          'isbn' => '978-602-7709-19-5',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	      [
	          'nim' => '78228371',
	          'isbn' => '978-602-336-421-3',
	          'status' => 'Not Return Yet',
	          'created_at' => \Carbon\Carbon::now('Asia/Jakarta'),
	          'batas' => \Carbon\Carbon::now('Asia/Jakarta')->addDays(5),
	      ],
	    ]);
    }
}
