<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const ERRORREASON = "No se pudo ejecutar el contrato por las siguientes razones : ";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleAll = Article::all();
        return response()->json($articleAll,201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $passValidation =  $this->validationArticle($request);
        if($passValidation->fails()){
            $errorRegisterFailed = self::ERRORREASON; 
            return response()->json("Error en alguno de los campos. Vuelva a internar");
            // return back()->withErrors($passValidation,'contractProccessForm')->with('contractFailed',$errorRegisterFailed)->withInput();
        }        
        Article::create([
            'art_code'=>$request->codeArticle,
            'art_name'=>$request->nameArticle,
            'art_quantity'=>$request->quantityArticle,
            'art_categorie'=>$request->categorieArticle
        ]);
        // $status = 'Articulo creado exitosamente';
        return response()->json("Se registro exitosamente. Codigo verifique en http://localhost:8000/api/articlesapi/".$request->codeArticle,201);
        // return redirect(route('articles.index'))->with('statusRegisterArticle',$status);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cod)
    {
        $article = Article::where('art_code',$cod)->first();
        if(!is_null($article)){
            return response()->json($article,201);
        }else{
            return response()->json("No se encontro ningun elemento. Verifique el codigo del articulo");

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article,201);
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
        $article = Article::findOrFail($id);
        $passValidation =  $this->validationArticleEdit($request);
        if($passValidation->fails()){
            $errorRegisterFailed = self::ERRORREASON; 
            return back()->withErrors($passValidation,'contractProccessForm')->with('contractFailed',$errorRegisterFailed)->withInput();
        }            
        $article->update(
            [
                'art_name'=>$request->nameArticle,
                'art_quantity'=>$request->quantityArticle,
            ]
        );
        $status = 'Articulo actualizado exitosamente';
        return redirect(route('articles.edit',$article->id))->with('updateArticle',$status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cod)
    {

        $article = Article::where('art_code',$cod)->first();
        if(!is_null($article)){
            $article->delete();
            $code = $article->art_code;
            return response()->json("Se elimino el articulo con codigo : ".$code,201);
        }else{
            return response()->json("No se encontro ningun elemento. Verifique el codigo del articulo");

        }        
    }


    // Funciones adicionales

    public function validationArticle(Request $request){
        $fieldCreate= [
            'codeArticle'=>'required|string|min:0',
            'nameArticle'=>'required|string|min:0',
            'quantityArticle'=>'required|integer|between:0,1000',

        ];
        $messageError=[
            'required' =>'Este campo ":attribute" es obligatorio',
            'integer'=>'":attribute" Debe ser numero entero',
            'between:0,1000'=>'":attribute" Fuera del rango',
            'string'=>'":attribute" Debe ser texto',
        ];
        $validacion = Validator::make($request->all(),$fieldCreate,$messageError);
        return $validacion;        
    }

    public function validationArticleEdit(Request $request){
        $fieldCreate= [
            'nameArticle'=>'required|string|min:0',
            'quantityArticle'=>'required|integer|between:0,1000',

        ];
        $messageError=[
            'required' =>'Este campo ":attribute" es obligatorio',
            'integer'=>'":attribute" Debe ser numero entero',
            'between:0,1000'=>'":attribute" Fuera del rango',
            'string'=>'":attribute" Debe ser texto',
        ];
        $validacion = Validator::make($request->all(),$fieldCreate,$messageError);
        return $validacion;        
    }  
}
