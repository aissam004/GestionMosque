<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPJasper\PHPJasper as PHPJasper;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materiels.index');
    }
    public function options()
    {
        return view('materiels.options');
    }

    public function generateListeMateriels(){
            // dd(storage_path('app\public\hello_world.jrxml'));
        $jasper = new PHPJasper;

        $jasper->compile(storage_path('app\public\Blank_A4.jrxml'))->execute();


        $input = Storage::path('public\Blank_A4.jasper');

    //  $output = $jasper->listParameters($input)->execute();

    /*  foreach($output as $parameter_description)
        print $parameter_description . '<pre>';*/


        $output = Storage::path('public');
        $options = [
            'format' => ['pdf'],
            'locale' => 'ar',

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

        return Storage::disk('public')->download('Blank_A4.pdf');
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
