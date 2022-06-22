<?php

use Illuminate\Database\Seeder;

class loai_phongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $list = [];

        $types = ["Thường", "Đơn", "Đôi", "Vip", "VVip"];
        sort($types);

        $today = new DateTime('2019-01-01 08:00:00');

        for ($i=1; $i <= count($types); $i++) {
            array_push($list, [
                'lp_ma'      => $i,
                'lp_ten'     => $types[$i-1],
                'lp_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'lp_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('loai_phong')->insert($list);
    }
}
