<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Log;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $model;
    private $model_log;

    public function __construct(User $user, Log $log)
    {
        $this->model = $user;
        $this->model_log = $log;
    }

    public function getAll(){

        $users = $this->model->all();
        return response()->json($users);
        
    }

    public function get($id){

        $user = $this->model->find($id);
        $user_log = $this->model->find($id)->userLogs()->orderBy('created_at', 'asc')->limit(5)->get();
        
        $param = ["data_user"=>$user, 'data_user_log' => $user_log];
        
        return response()->json($param);
    }

    public function store(Request $request){
        
        $validator = Validator::make(
            $request->all(),
            [
                "name" => ' required | max: 50 | min 10',   
                "email" => ' required | max: 100 | min 10',   
                "document_number" => ' required | max: 25',   
                "phone_number" => ' required | max: 15',   
                "country" => ' required | max: 2 | min: 2'   
            ]
        ); 

        $user = $this->model->create($request->all());

        return response()->json($user);
    }

    public function update($id, Request $request) {

        $user_data_old = $this->model->find($id);
        
        $user_data_new = $request->all();

        $log_param = [
            "user_id" => $id,
            "data_old" => json_encode($user_data_old),
            "data_new" => json_encode($user_data_new)
        ];

        //executando alteração
        $user = $user_data_old->update($request->all());

        $log = $this->model_log->create($log_param);

        return response()->json($user);
    }

    public function destroy($id){

        $user = $this->model->find($id)
            ->delete();

            return response()->json(null);
        
    }


}
