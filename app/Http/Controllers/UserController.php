<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\JwtAuth;



class UserController extends Controller
{
    //registro
    public function registro(Request $request){
        $json = $request -> input ('json', null);
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $name = (!is_null($json) && isset($params->name)) ? $params->name : null;
        $role = 'Admin';
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;

        if(!is_null($email) && !is_null($name) && !is_null($password)){
            $user = new User();
            $user->email = $email;
            $user->name = $name;
            $user->role = $role;

            $pwd = hash ('sha256', $password);
            $user->password = $pwd;

            //validar que el usuario no exista
            $isset_user = User::where('email','=',$email)->get();
            if(count($isset_user)==0){
                $user->save();
                $response = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'Usuario Creado si señor!',
                );           
            }else{
                $response = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => 'Usuario Existe ya',
                );          
            }

        }else{
            $response = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Usuario No puede ser creado!',
            );
        }
        return response()->json($response,200);
        
    }

    //login de usuario
    public function login(Request $request){
        //Instanciar la Clase de JWT
        $jwtAuth = new JwtAuth();
        //Recibir los datos por Post
        $json = $request->input('json', null);
        $params = json_decode($json);

        $email = (!is_null($json) && isset($params->email)) ? $params->email : null;
        $password = (!is_null($json) && isset($params->password)) ? $params->password : null;

        if(!is_null($email) && !is_null($password)){
            $pwd = hash('sha256', $password);
            $response = $jwtAuth->singup($email,$pwd);
        }else{
            $response = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Error de Login!'
            );
        } 
        return response()->json($response, 200);
    }
}
