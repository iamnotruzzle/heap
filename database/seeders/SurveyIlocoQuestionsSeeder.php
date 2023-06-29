<?php

namespace Database\Seeders;

use App\Models\SurveyIlocoQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyIlocoQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_iloco_questions')->truncate();

        $survey_iloco_questions = [
            [
                // 1
                'desc' => 'Nadalus, naurnos, ken komportable dagiti naipaay a pagurayan dagiti pasiente.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 2
                'desc' => 'Nadalus, naurnos, ken umdas ti danum a maaramat kadagiti kasilia ken pagdigosan iti uneg ti pasilidad.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 3
                'desc' => "Kanayon a nadalus ken naurnos dagiti siled ken komportable dagiti pasiente. Nga agyan kadagitoy.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 4
                'desc' => 'Dagiti proseso/addang pakairamanan panagbayadan ket nalaka lang ken simple. (SQD3)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 5
                'desc' => 'Naipatungpal diay opisina dagiti kasapulan ken adding base iti naited nga impormasyon. (SQD2)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 6
                'desc' => 'Nalaka/nabiit ko lang nga nasarakan dagiti impormasyon pannkaproseso kadagiti opisina. (SQD4)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 7
                'desc' => 'Nausar ko iti oras ko ditoy iti umno wenno naidatag nga oras. (SQD1)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 8
                'desc' => 'Napintas ti pannakailawlawag ti proseso ken medikal a kondision ti pasiente.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 9
                'desc' => 'Dagiti sentimyentomi, kultura ken pammatimi ket naipangag ken naikkan ti konsiderasyon iti proseso a panagagas.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 10
                'desc' => 'Naikkan kami ti gundaway nga nagdisidir no ana nga wagas ti maisayangkat a proseso ti panagagas.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 11
                'desc' => 'Naawat ko dagiti kasapulan ditoy ospital (no saan man), ket naipaawat met a nalaing. (SQD8)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 12
                'desc' => 'Nabayadak iti umno a para ti kinwak nga addang. (SQD5)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 13
                'desc' => 'Nadayaw ken managtulong dagiti empleado ti ospital a nangtaming kadakami. (SQD7)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 14
                'desc' => 'Nasayaat ti pannakataming ko, awan pinnigsaan bayat pannakataming/transakyon ko. (SQD6)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // 15
                'desc' => 'Napnekak kadagiti naited kaniak a serbisyo. (SQD0)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // not numbered 1
                'desc' => 'Malaksid kadagiti nadakamat nga impormasion, addada kadi pay sabali a kapadasan a kayatyo nga idanon? Pakisurat laeng iti nailatang nga espasio. (Opsyonal)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                // not numbered 2
                'desc' => 'Adda kadi dagiti empleado ti ospital a kayatmo a mapadayawan? No adda, pakisurat ti nagan iti nailanad nga espasio.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_iloco_questions as $sq) {
            SurveyIlocoQuestions::create($sq);
        }
    }
}
