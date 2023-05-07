<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
    public function update(Request $request, string $id)
    {   echo('oi');
        Product::find($id)->update($request->all());
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $produto = Product::find($id)->delete($id);
        return back()->with('msg', 'Produto deletado com sucesso');

    }
    public function lista(){
        
        
       
    }
}
