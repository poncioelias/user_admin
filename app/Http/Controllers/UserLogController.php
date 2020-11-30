<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class UserLogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Log $log)
    {
        $this->model = $log;
    }


    public function getAll($start,$limit){
             
        $logs = $this->model->offset($start)->limit($limit)->get();
        return response()->json($logs);
    
    }

    public function get($id,$start,$limit){

        $logs = $this->model->find($id)->offset($start)->limit($limit)->get();
        return response()->json($logs);

    }

}
