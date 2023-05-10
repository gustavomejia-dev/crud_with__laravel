<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Product::all();
        return view('site.lista.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */

  
    public function create(Request $request)

    {   
        return view("site.form.index");  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        Product::create($request->all());
        return redirect()->route('products.create')
                        ->with('success','Product created successfully.');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //listando usuario
        $produto =  Product::find($id);
        $produto = $produto->toJson();
        return $produto;
       
        
        // echo "<pre>";print_r($produto);echo "</pre>";
        // return view('site.lista.index');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        // return json_decode((Product::get($id)));
        // echo "<pre>";print_r($produto); echo"</pre>";  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {//    Request $request, 
        // echo "<pre>"; print_r($request->all());echo "</pre>";die();
        $updateProd = Product::find($request->id)->update($request->all());
        $msg = $updateProd ? 'sucesso' : 'error';
        return response()->json($msg);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        
        $deleteProd = Product::find($id)->delete($id);
        $msg = $deleteProd ? 'sucesso' : 'error';
        return response()->json($msg);
    }
    public function listar(){
        $produtos = Product::all();
        $produtos = $produtos->toJson();
        return $produtos;
        // return view('site.lista.index', ['produtos' => $produtos]);
        // return view('site.lista.index', ['produtos' => $produtos]);
       
    }
}