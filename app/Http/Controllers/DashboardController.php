<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $id = (string)auth()->user()->id;
        $duties = Duty::where('user_id', $id)->orderBy('updated_at','desc')->get();
        return view('dashboard',compact('duties'));
    }

    public function upload(Request $request)
    {   
        $duty = 'Data is missing:';
        if($request -> remove){
            if($request -> remove != '0'){
                $duty = Duty::where('id',$request->remove)->delete();

            } else {
                $duty = $duty." id on remove";

            }
        } elseif ($request -> complete){
            if($request -> complete != '0'){
                date_default_timezone_set('America/Mexico_City');
                $duty = Duty::where('id',$request->complete)->first();

                if($duty->completed == NULL){
                    $duty -> completed = date('Y-m-d H:i:00');

                }else{
                    $duty -> completed = NULL;
                
                }
                $duty -> save();
            
            } else {
                $duty = $duty." id on complete";
            
            }
        } else if($request -> name && $request -> exp_date && $request -> st_date){
            if ($request -> modify){
                if($request -> modify != '0'){
                    $duty = Duty::where('id',$request->modify)->first();

                }
            }else{
                $duty = new Duty();

            }
                $duty -> name = $request -> name;
                $duty -> description = $request -> description;
                $duty -> st_date = $request->st_date." ".$request->st_time;
                $duty -> exp_date = $request->exp_date." ".$request->exp_time;  
                $duty -> user_id = auth()->user()->id;
                $duty -> save();

        } else {
            $duty = $duty.' name, start date or expiration date on upsert';

        }
        return $duty;
    }
}
