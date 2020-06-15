<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Phpml\Classification\NaiveBayes;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = [
                    'Apakah anda merasakan tubuh anda mengalami demam?', 
                    'Apakah anda mengalami batuk-batuk?', 
                    'Apakah anda merasakan hidung tersumbat?',
                    'Apakah anda merasakan sakit kepala/ pusing?',
                    'Apakah anda mengalami kesusahan untuk menelan/ sakit tenggorokan?',
                    'Apakah anda mengalami lesu dan lemas?',
                    'Apakah anda merasakan sesak nafas?',
                    'Bila dihitung dalam jangka waktu tertentu apakah nafas anda terasa cepat?',
                    'Bila diperhatikan apakah suara nafas kasar?',
                    'Apakah akhir-akhir ini nafsu makan anda berkurang?',
                    'Apakah anda merasakan adanya penurunan kerja indra pengecap dan penciuman?',
                    'Apakah bila berbicara suara anda serak?',
                    'Apakah anda merasakan gelisah/ kesulitan untuk tidur?',
                    'Apakah anda merasakan adanya nyeri pada bagian dada?',
                    'Bila diperhatikan apakah ada warna merah pada amandel?'
                ];

        return view('question',['question'=> $questions]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $hasil = $request->answer1;
        // dd($hasil);
        $samples = [
            [1,0,1,1,0,1,0,0,0,0,1,0,1,0,0],
            [1,1,0,1,1,1,0,0,0,1,0,1,1,0,0], 
            [1,1,0,1,0,1,0,0,0,1,0,1,1,0,0],
            [1,1,0,1,0,1,1,1,1,1,0,0,1,0,0],
            [1,1,0,1,0,1,1,1,1,1,0,0,1,0,0],
            [1,1,0,1,0,1,1,1,1,1,0,0,1,0,0],
            [1,1,0,0,0,0,1,1,0,1,0,0,1,1,0],
            [1,1,1,1,0,1,0,0,0,1,1,0,1,0,0],
            [1,1,0,1,0,1,0,0,0,1,0,0,1,0,0]
            ];
        $labels = [
            'Rhinosinusitis', 'Radang Tenggorokan', 'Epiglottis', 'Bronkitis','Bronkiolitis','Pneumonia','Pleuritis','Common Cold','ILI (Influenza Like Illness)'
        ];
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);
        
        $finalResult = $classifier->predict([$request->answer1,$request->answer2,$request->answer3,$request->answer4,$request->answer5,        $request->answer6,$request->answer7,$request->answer8,$request->answer9,$request->answer10,$request->answer11,$request->answer12,$request->answer13,$request->answer14,$request->answer15]);

        $resValue = $classifier->predictValue([$request->answer1,$request->answer2,$request->answer3,$request->answer4,$request->answer5,$request->answer6,$request->answer7,$request->answer8,$request->answer9,$request->answer10,$request->answer11,$request->answer12,$request->answer13,$request->answer14,$request->answer15]);
        //dd($resValue);
        
        return view('result',['resValue'=> $resValue, 'finalResult'=>$finalResult, 'label'=>$labels]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
