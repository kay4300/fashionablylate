<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'last_name' => '山田',
            'first_name' => '太郎',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '09012345678',
            'address' => '東京都千代田区丸の内1-1-1',
            'building' => '',
            'category_id' => 1,
            'detail' => '12/25に変更してください。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '佐藤',
            'first_name' => '花子',
            'gender' => 2,
            'email' => '789012@localhost.com',
            'tel' => '08056789012',
            'address' => '東京都港区赤坂1-1-1',
            'building' => '',
            'category_id' => 2,
            'detail' => 'サイズを交換したいです。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '鈴木',
            'first_name' => '次郎',
            'gender' => 1,
            'email' => '345678@localhost.com',
            'tel' => '07023456789',
            'address' => '東京都新宿区新宿1-1-1',
            'building' => '',
            'category_id' => 1,
            'detail' => '配達日時を変更したいです。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '高橋',
            'first_name' => '三郎',
            'gender' => 1,
            'email' => '901234@localhost.com',
            'tel' => '09034567890',
            'address' => '東京都渋谷区渋谷1-1-1',
            'building' => '',
            'category_id' => 3,
            'detail' => '電源が入りません。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '伊藤',
            'first_name' => '史子',
            'gender' => 2,
            'email' => '567890@localhost.com',
            'tel' => '08090123456',
            'address' => '東京都港区六本木1-1-1',
            'building' => '',
            'category_id' => 2,
            'detail' => 'サイズを交換したいです。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '渡辺',
            'first_name' => '美咲',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '09012346578',
            'address' => '東京都港区六本木1-2-1',
            'building' => '',
            'category_id' => 4,
            'detail' => '年末年始の営業時間を教えてください。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '中村',
            'first_name' => '太郎',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '09034567890',
            'address' => '東京都港区六本木3-1-1',
            'building' => '',
            'category_id' => 4,
            'detail' => '子供服を扱っているお店はどこですか。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '小林',
            'first_name' => '花子',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '090123459878',
            'address' => '東京都港区六本木1-1-5',
            'building' => '',
            'category_id' => 2,
            'detail' => '色交換はできますか。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '加藤',
            'first_name' => '留美',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '09012456790',
            'address' => '東京都港区六本木3-2-1',
            'building' => '',
            'category_id' => 4,
            'detail' => 'ギフト包装は有料ですか。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '吉田',
            'first_name' => '健一',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '09016778899',
            'address' => '東京都港区六本木4-5-6',
            'building' => '',
            'category_id' => 3,
            'detail' => '蓋が閉まりません。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '山本',
            'first_name' => '彩',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '08012234456',
            'address' => '東京都港区六本木10-1-2',
            'building' => '',
            'category_id' => 1,
            'detail' => '1/10 午前中に届けてほしい。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '斎藤',
            'first_name' => '太郎',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '08043215687',
            'address' => '東京都港区六本木8-5-1',
            'building' => '',
            'category_id' => 2,
            'detail' => 'サイズをMに交換はできますか。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '松本',
            'first_name' => '華子',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '09012675601',
            'address' => '東京都新宿区新宿1-1-1',
            'building' => '',
            'category_id' => 5,
            'detail' => '登録住所を変更したいです。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '井上',
            'first_name' => '真',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '08022347789',
            'address' => '東京都目黒区目黒1-1-1',
            'building' => '',
            'category_id' => 4,
            'detail' => '定休日はありますか。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '木村',
            'first_name' => '里奈',
            'gender' => 2,
            'email' => '123456@localhost.com',
            'tel' => '09056567878',
            'address' => '東京都練馬区練馬1-1-1',
            'building' => '',
            'category_id' => 3,
            'detail' => '一度洗濯しただけで縮んで着れなくなりました。',
        ];
        DB::table('contacts')->insert($param);

        $param = [
            'last_name' => '林',
            'first_name' => '大輔',
            'gender' => 1,
            'email' => '123456@localhost.com',
            'tel' => '09044345678',
            'address' => '東京都渋谷区渋谷5-7-12',
            'building' => '',
            'category_id' => 1,
            'detail' => '1/3 午前中に届けてほしい。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '清水',
                'first_name' => '涼子',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '08011245078',
                'address' => '東京都新宿区新宿2-2-1',
                'building' => '',
                'category_id' => 4,
                'detail' => 'コートの修理をお願いしたいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '山崎',
                'first_name' => '健太',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '08047883278',
                'address' => '東京都目黒区目黒4-1-1',
                'building' => '',
                'category_id' => 3,
                'detail' => 'Mサイズを頼んだのにLサイズが届いた。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '森',
                'first_name' => '綾香',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '09065902345',
                'address' => '東京都北区北谷1-1-1',
                'building' => 'マンションきた505',
                'category_id' => 5,
                'detail' => '登録アドレスを変更したいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '池田',
                'first_name' => '翔太',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '08043067219',
                'address' => '東京都江東区江東1-1-1',
                'building' => '江東第一ビル303',
                'category_id' => 4,
                'detail' => '定休日はありますか。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '田中',
                'first_name' => '太郎',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '09078341102',
                'address' => '東京都練馬区練馬2-2-1',
                'building' => '',
                'category_id' => 1,
                'detail' => '12/31 18時以降に届けてほしいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '石川',
                'first_name' => '美穂',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '08032865123',
                'address' => '東京都港区西麻布1-1-1',
                'building' => '',
                'category_id' => 3,
                'detail' => '届いたら壊れていた。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '橋本',
                'first_name' => '直人',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '09064190909',
                'address' => '東京都渋谷区渋谷7-7-7',
                'building' => '',
                'category_id' => 2,
                'detail' => '返品の手続きをしたいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '中村',
                'first_name' => '由美子',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '09011349078',
                'address' => '東京都大田区太田1-1-1',
                'building' => '太田ハイツ202',
                'category_id' => 5,
                'detail' => 'DMを止めたいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '大野',
                'first_name' => '彰',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '08031219070',
                'address' => '東京都目黒区目黒5-5-1',
                'building' => '',
                'category_id' => 4,
                'detail' => '定休日はありますか。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '岡田',
                'first_name' => '麻由美',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '08034561289',
                'address' => '東京都渋谷区渋谷1-6-8',
                'building' => 'メゾン渋谷302',
                'category_id' => 2,
                'detail' => 'サイズが合わなかったので交換したいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '村上',
                'first_name' => '直人',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '07012345678',
                'address' => '東京都渋谷区渋谷3-3-15',
                'building' => 'パークタウンSHIBUYA701',
                'category_id' => 1,
                'detail' => '12/23 14:00~16:00に届けてほしい。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '遠藤',
                'first_name' => '智代',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '07078906754',
                'address' => '東京都千代田区千代田2-1-1',
                'building' => '',
                'category_id' => 3,
                'detail' => '届いたら壊れていた。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '佐々木',
                'first_name' => '太郎',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '09038495069',
                'address' => '東京都新宿区新宿5-7-1',
                'building' => '',
                'category_id' => 5,
                'detail' => 'サイズが合わないので返品したいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '後藤',
                'first_name' => '麻耶',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '08085653219',
                'address' => '東京都渋谷区西渋谷3-5-4',
                'building' => 'SHIBUYA EAST1001',
                'category_id' => 2,
                'detail' => '違う商品に交換はできますか。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '石井',
                'first_name' => '博',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '09022384435',
                'address' => '東京都品川区品川1-1-1',
                'building' => '',
                'category_id' => 5,
                'detail' => 'サイズが合わないので返品したいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '森',
                'first_name' => '幸次',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '08017845670',
                'address' => '東京都渋谷区渋谷3-7-10',
                'building' => '渋谷グランドビル404',
                'category_id' => 2,
                'detail' => '3Fの受付に届けてください。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '高田',
                'first_name' => '文太',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '09016781532',
                'address' => '東京都江戸川区江戸川1-1-1',
                'building' => '',
                'category_id' => 2,
                'detail' => 'Lサイズを買ったのですがMサイズに交換したいです。',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '藤田',
                'first_name' => '梨花',
                'gender' => 2,
                'email' => '123456@localhost.com',
                'tel' => '09032359685',
                'address' => '東京都中野区中野1-1-1',
                'building' => '',
                'category_id' => 1,
                'detail' => '12/24 午前中に届けてください',
            ];
            DB::table('contacts')->insert($param);

            $param = [
                'last_name' => '北村',
                'first_name' => '聖也',
                'gender' => 1,
                'email' => '123456@localhost.com',
                'tel' => '08023578690',
                'address' => '東京都江東区江東2-11-1',
                'building' => 'ウェルネス江東203',
                'category_id' => 1,
                'detail' => '12/31 午前中に届けてください',
            ];
            DB::table('contacts')->insert($param);

        
            Contact::factory()->count(35)->create();
        }
}