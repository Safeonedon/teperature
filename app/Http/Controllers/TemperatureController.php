<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;
use Ixudra\Curl\Facades\Curl;

class TemperatureController extends Controller
{
    //

    /**
    fetching data from api and insert to database
     **/
    public function fetchData(){

        $response = Curl::to('https://api.open-meteo.com/v1/forecast?latitude=28.50&longitude=-10.00&hourly=temperature_2m')
            ->get();
        $datafeched=json_decode($response ,true);
        $data=[];
             foreach ( $datafeched['hourly']['time'] as $key => $item){
                 $DateTime=explode("T", $item);
                 $data[$key]=[
                     'reference'=>$item,
                     'date'=>$DateTime[0],
                     'time'=>$DateTime[1],
                     'temperature'=>$datafeched['hourly']['temperature_2m'][$key],
                 ];
                 $temterature=Temperature::where('reference',$item)->count();

                 // check if temperature already exist
                 if ( $temterature > 0){
                 //update old temerature
                 $temterature=Temperature::where('reference',$item)->update($data[$key]);

                 }else{
                //create new temerature
                     $temterature=Temperature::create($data[$key]);

                 }
             }
        return  true;


    }
    /**
     * get crud data
     *
     * @return int
     */
    public function getTemperatureDaily()
    {
        $data=Temperature::where('date',date('Y-m-d'))->get();
        $dataWeek=$this->getTemperatureWeekly();
         return view('pages.daily')->with(['data'=>$data,'dataweek'=>$dataWeek]);
    }
    /**
     * get weekly data
     *
     * @return int
     */
    public function getTemperatureWeekly()
    {


        $data=Temperature::where('date','>=',date('Y-m-d'))->get();
        $response=[];
        foreach ($data as $key =>$temp){
             $response[$temp->date][$key]=$temp;

        }
        return $response;
    }
    /**
     * return crud view with data
     *
     * @return int
     */
    public function crud()
    {
        $data=Temperature::where('date',date('Y-m-d'))->get();
        //$dataWeek=$this->getTemperatureWeekly();
        return view('pages.crud')->with(['data'=>$data]);

    }
    public function savecrud(Request $request)
    {
        $data=Temperature::where('reference',$request->reference)->update(
            [
                'date'=>$request->date,
                'time'=>$request->time,
                'temperature'=>$request->temperature,
            ]
        );
        $data=Temperature::where('date',date('Y-m-d'))->get();
         return view('pages.crud')->with(['data'=>$data]);

    }
    public function deletecrud($reference)
    {
        $data=Temperature::where('reference',$reference)->delete();
          return redirect()->back();

    }
}
