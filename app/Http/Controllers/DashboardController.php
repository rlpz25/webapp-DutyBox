<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {   
        date_default_timezone_set('America/Mexico_City');
        $current_date = date('Y-m-d');
        $current_time = date('H:i:00');
        $now = $current_date.' '.$current_time;
        $indexes = 20;
        // $duties = Duty::where('user_id', auth()->user()->id)->lazyById(1, $column = 'id');
        $duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('st_date','<',$now)->where('exp_date','>',$now)->paginate($indexes);
        $future_duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('st_date','>',$now)->paginate($indexes);
        $exp_duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('exp_date','<',$now)->paginate($indexes);
        $comp_duties = Duty::where('user_id', auth()->user()->id)->where('completed','!=',NULL)->paginate($indexes);

        return view('dashboard',compact('duties','comp_duties','future_duties','exp_duties','current_date','current_time'));
    }

    public function upload(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'exp_date' => 'required',
            'st_date' => 'required',
        ]);

        if($request -> name && $request -> exp_date && $request -> st_date){
            $duty = new Duty();
            $duty -> name = $request -> name;
            $duty -> description = $request -> description;
            $duty -> st_date = $request->st_date." ".$request->st_time;
            $duty -> exp_date = $request->exp_date." ".$request->exp_time;  
            $duty -> user_id = auth()->user()->id;
            $duty -> save();
            // return redirect()->route('dashboard');
            return "valid and updated";
        }else{
            return "invalid";
        }

        
       
    }
}
