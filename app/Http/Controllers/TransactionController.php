<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPJasper\PHPJasper;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($all=true,$isincome=true)
    {
        $transactions=Transaction::all();
        return view('transactions.index',compact(['all','isincome','transactions']));
    }
    public function incomes()
    {
       return $this->index(0,1);
    }
    public function depenses()
    {
       return $this->index(0,0);
    }
    public function generateTransactions($all,$isincome){
        $jasper = new PHPJasper;

        $output=$jasper->compile(storage_path('app\public\Transactions.jrxml'))->execute();
        $all=$all?'TRUE':'FALSE';
        $isincome=$isincome?'TRUE':'FALSE';
        //dd($all,$isincome);
        $input = Storage::path('public\Transactions.jasper');
        $image=Storage::disk('public')->url('logo.jpg');

        $output = Storage::path('public');
        $options = [
            'format' => ['pdf'],
            'locale' => 'ar',
            'params' => ['all'=>$all,'isincome'=>$isincome,'image'=>$image],
            'db_connection' => [
                'driver' => env('DB_CONNECTION'), //mysql, ....
                'username' => env('DB_USERNAME'),
                'password' => env('DB_PASSWORD'),
                'host' => env('DB_HOST'),
                'database' => env('DB_DATABASE'),
                'port' => env('DB_PORT')
            ]
        ];

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();

        return Storage::disk('public')->download('Transactions.pdf');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $personne=Personne::find($id);
        return view('personnes.show',compact('personne'));
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
