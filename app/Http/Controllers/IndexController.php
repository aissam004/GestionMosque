<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return view('accueil',compact(['boites','documents']));

        $incomesMonth=Transaction::incomes()->whereYear('date', date('Y'))->whereMonth('date',date('m'))->sum('total');
        $depensesMonth=Transaction::depenses()->whereYear('date', date('Y'))->whereMonth('date',date('m'))->sum('total');
        $months=[];
        $incomesYear=[];
        $depensesYear=[];
        $rgb=[];
        for ($m=1; $m<=12; $m++) {
            $month = __(date('F', mktime(0,0,0,$m, 1, date('Y'))));
            $income=Transaction::incomes()->whereYear('date', date('Y'))->whereMonth('date',date($m))->sum('total');
            $depense=Transaction::depenses()->whereYear('date', date('Y'))->whereMonth('date',date($m))->sum('total');
            array_push($months,$month);
            array_push($incomesYear,$income);
            array_push($depensesYear,$depense*-1);
            array_push($rgb,$this->bm_random_rgb());
        }

        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($months)
        ->datasets([
            [
                "label" => __('Income'),
                'backgroundColor' =>'rgba(0,255,0,0.8)',
                'data' => $incomesYear,

            ],
            [
                "label" => __('Depense'),
                'backgroundColor' =>'rgba(255,0,0,0.8)',
                'data' => $depensesYear
            ]

        ])
        ->options([
            "title"=>[
                "display"=>true,
                "text"=>"الرسم البياني للمداخيل والمصاريف لسنة ".date('Y')
            ]
        ]);

        return view('accueil',compact('incomesMonth','depensesMonth','chartjs'));
    }

    function bm_random_rgb() {

         return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')';

 }

}
