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
        $id = auth()->user()->id;
        // $indexes = 10;
        // $duties = Duty::where('user_id', auth()->user()->id)->lazyById(1, $column = 'id');
        $pd_duties = Duty::where('user_id', $id)->where('completed',NULL)->where('st_date','<',$now)->where('exp_date','>',$now)->orderBy('exp_date','asc')->get();
        $ft_duties = Duty::where('user_id', $id)->where('completed',NULL)->where('st_date','>',$now)->orderBy('st_date','asc')->get();
        $xp_duties = Duty::where('user_id', $id)->where('completed',NULL)->where('exp_date','<',$now)->orderBy('exp_date','desc')->get();
        $cp_duties = Duty::where('user_id', $id)->where('completed','!=',NULL)->orderBy('completed','desc')->get();

        return view('dashboard',compact('pd_duties','cp_duties','ft_duties','xp_duties','current_date','current_time'));
    }

    public function upload(Request $request)
    {   
        $duty = 0;
        if($request -> remove){
            // $duty = 'es remove';
            if($request -> remove != '0'){
                // $duty = 'tiene id el remove';
                $duty = Duty::where('id',$request->remove)->delete();
            }
        } elseif ($request -> complete){
            // $duty = 'es request';
            if($request -> complete != '0'){
                // $duty = 'tiene id el request';
                date_default_timezone_set('America/Mexico_City');
                $duty = Duty::where('id',$request->complete)->first();
                if($duty->completed == NULL){
                    $duty -> completed = date('Y-m-d H:i:00');
                }else{
                    $duty -> completed = NULL;
                }
                $duty -> save();
            }
        } elseif($request -> name && $request -> exp_date && $request -> st_date){
            $request -> validate([
                'name' => 'required',
                'exp_date' => 'required',
                'st_date' => 'required',
            ]);
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
        }
        return $duty;
    }

    // public function getData(){
    //     date_default_timezone_set('America/Mexico_City');
    //     $current_date = date('Y-m-d');
    //     $current_time = date('H:i:00');
    //     $now = $current_date.' '.$current_time;
    //     $indexes = 10;
    //     $pd_duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('st_date','<',$now)->where('exp_date','>',$now)->get();
    //     $ft_duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('st_date','>',$now)->get();
    //     $xp_duties = Duty::where('user_id', auth()->user()->id)->where('completed',NULL)->where('exp_date','<',$now)->get();
    //     $cp_duties = Duty::where('user_id', auth()->user()->id)->where('completed','!=',NULL)->get();
    //     return [$pd_duties,$ft_duties,$xp_duties,$cp_duties];
    // }
}
