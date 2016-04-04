<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\createProductRequest;
use App\Http\Requests\EditProductRequest;
use App\models\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only'=>['create','store','edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('createProductForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $req)
    {
        //
        $product=Product::create($req->all());

        $newName="photo".$product->id."jpg";
        $req->file("photo")->move("productphotos",$newName);
        // $file=$req->file("photo");
        $product->photo=$newName;
        $product->save();

        return redirect('products/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $product=Product::find($id);
        // return view('productdetails',['product'=>$product]);
        $product=\App\models\Product::withTrashed()->find($id);
            return view('showproduct',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product=\App\models\Product::find($id);
        return view('editProductForm',['product'=>$product]);
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
        //
        $product=\App\models\Product::find($id);
        $product->fill(\Request::all());
        $product->save();
        return redirect('types/1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        return redirect('types/'.$product->type_id);

    }
}
