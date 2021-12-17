<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use App\Helpers\JwtAuth;
use Illuminate\Http\Request;
use App\Models\Producto;



class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      



    public function index(Request $request)
    {
        $hash = $request->header('Authorization',null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);
        if($checkToken){ 
            echo "Index Autenticado"; die();
        }else{
            echo "No Autenticado"; die();
        }


        if ($request) {
            $query = trim($request->get('buscar'));

            $productosNom = Producto::where ('nombre', 'LIKE', '%' . $query . '%')
                ->orWhere ('codigo', 'LIKE', '%' . $query . '%')
                ->orWhere ('sucursal', 'LIKE', '%' . $query . '%')
                ->orderBy('codigo', 'asc')
                ->get();

            return view('Producto.index') -> with('productos', $productosNom, 'buscar', $query);

            
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Producto/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //Metodo para crear productos
        //$productos = new Producto(); 

        //$productos-> codigo = $request-> get('codigo'); 
        //$productos-> nombre = $request-> get('nombre'); 
        //$productos-> categoria = $request-> get('categoria'); 
        //$productos-> sucursal = $request-> get('sucursal'); 
        //$productos-> descripcion = $request-> get('descripcion'); 
        //$productos-> cantidad = $request-> get('cantidad'); 
        //$productos-> precio = $request-> get('precio'); 
        //$productos -> save();
        //return redirect('/productos'); 

        // Fin de metodo propio


        //Metodo validacion profe
        $hash = $request->header('Authorization',null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);
        if($checkToken){ 
            //Recibimos datos por Post
            $json = $request->input('json', null);
            $params = json_decode($json); //a Objeto
            $params_array = json_decode($json, true); // a Arreglo

            $validate= \Validator::make($params_array,[
                'codigo' => 'required',
                'descripcion' => 'required',
                'precio' => 'required',
                'categoria' => 'required',
                'nombre' => 'required',
                'sucursal' => 'required'
            ]);

            if($validate->fails()){
                $response = array(
                    'status' => 'error',
                    'code' => 400,
                    'message' => $validate->errors()
                );
            }else{
                //obtengo token decodificado
                $user = $jwtAuth->checkToken($hash, true);

                //crear el libro
                $productos = new Producto(); 

                $productos->user_id = $user->sub;
                $productos->codigo = $params->codigo;
                $productos->descripcion = $params->descripcion;
                $productos->precio = $params->precio;
                $productos->categoria = $params->categoria;
                $productos->nombre = $params->nombre; 
                $productos->sucursal = $params->sucursal; 

                $productos -> save();
                //return redirect('/productos'); 

                $response = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'PRODUCTO guardado',
                    'data' => $productos
                );
            }
        }else{
            $response = array(
                'status' => 'error',
                'code' => 400,
                'message' => 'Login Incorrecto'
            );
        }
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto =Producto::find($id);
        return view('Producto.index')-> with('producto',$producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto =Producto::find($id);
        return view('Producto.edit')-> with('producto',$producto);
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
        $producto =  Producto::find($id);

        $producto-> codigo = $request-> get('codigo'); 
        $producto-> descripcion = $request-> get('descripcion'); 
        $producto-> precio = $request-> get('precio'); 
        $producto-> categoria = $request-> get('categoria'); 
        $producto-> nombre = $request-> get('nombre'); 
        $producto-> sucursal = $request-> get('sucursal'); 

        $producto -> save();

        return redirect('/productos'); 

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto =  Producto::find($id);
        $producto-> delete(); 
        return redirect('/productos');
    }
}
