<?php

namespace Database\Seeders;

use App\Models\SurveyTagalogQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyTagalogQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_tagalog_questions')->truncate();

        $survey_tagalog_questions = [
            [
                // 1
                'desc' => 'Ang mga waiting area ay malinis, maayos, at komportable.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 2
                'desc' => 'Ang mga palikuran at banyo sa loob ng ospital ay napananatiling malinis, maayos at lagging may suplay ng tubig.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 3
                'desc' => "Ang mga silid ng mga pasyente ay napananatiling malinis, maayos, at komportable.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 4
                'desc' => 'Ang mga hakbang (kabilang ang pagbabayad) na kailangan kong gawin para sa aking transaksiyon ay madali at simple. (SQD3)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 5
                'desc' => 'Sinunod ng opisina ang mga kinakailangan at hakbang ng transaksiyon batay sa impormasyong ibinigay. (SQD2)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 6
                'desc' => 'Madali kong nakita ang impormasyon tungkol sa aking transaksiyon mula sa opisina o sa website nito. (SQD4)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 7
                'desc' => ' Naglaan ako ng makatwirang panahon ng pagproseso para sa aking transaksiyon. (SQD1)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 8
                'desc' => 'Ang kondisyong medikal, mga pamamaraan at mga bilin ay malinaw na tinalakay.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 9
                'desc' => 'Ang aming mga saloobin, pinagmulang kultural , at mga paniniwala ay narinig at isinasaalang-alang sa pamamaraan ng paggamot.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 10
                'desc' => 'Binigyan kami ng pagkakataong magpasya kung aling pamamaraan ng paggamot ang isasagawa.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 11
                'desc' => 'Nakuha ko ang kailangan ko mula sa ospital, o (kung tinanggihan) ang pagtanggi sa kahilingan ay sapat na ipinaliwanag sa akin. (SQD8)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 12
                'desc' => 'I paid a reasonable amount of fees for my transaction.(SQD5)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 13
                'desc' => 'Nagbayad ako ng makatwirang halaga ng mga bayarin para sa aking transaksiyon. (SQD5)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 14
                'desc' => 'Tinatrato ako ng patas, o "walang palakasan", sa panahon ng aking transaksiyon. (SQD6)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 15
                'desc' => 'Kuntento ako sa natanggap kong serbsiyo.  (SQD0)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // not numbered 1
                'desc' => 'Mga mungkahi kung paano pa mapapabuti ang aming mga serbisyo (opsiyonal)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // not numbered 2
                'desc' => 'Kung naaangkop, mangyaring tukuyin ang pangalan ng sinumang kahanga-hangang kawani/tauhan ng ospital na gusto mong purihin, kasama na ang iyong dahilan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_tagalog_questions as $sq) {
            SurveyTagalogQuestions::create($sq);
        }
    }
}
