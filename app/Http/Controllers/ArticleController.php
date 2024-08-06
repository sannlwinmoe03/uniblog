<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;


class ArticleController extends Controller
{
   public function index()
   {
       $data = Article::latest()->paginate(10);
       return view('articles.index', [
           'articles' => $data
       ]);
   }
   public function detail($id)
   {
    $article= Article::find($id);

       return view('articles.detail',['article'=>$article]);
   }

   public function add(){


$categories = Category::all();

        return view("articles.add", [
            'categories' => $categories
        ]);

   }

   public function create()
   {

       
    

    $validator=validator(request()->all(), [
        
        'title'=>'required',
        'body'=>'required',
        'category_id'=>'required',
        
        
    ]);

    if($validator->fails()){
return back()->withErrors($validator);
    }

    


    $article = new Article;
    $article->title=request()->title;
    $article->body=request()->body;
   
    $article->category_id=request()->category_id;
    $article->user_id = auth()->user()->id;
    $article->save();

    return redirect("/articles");
   }

   


   public function edit($id){
    return view('articles.edit', [
        'article' => Article::find($id),
        'categories' => Category::all(),
    ]);


//     $article= Article::find($id);
//     $data = [
//         [ "id" => 1, "name" => "News" ],
//         [ "id" => 2, "name" => "Tech" ],
//         [ "id" => 3, "name" => "Knowledge" ],
        
//     ];
//  return view('articles.edit', ['article'=>$article], ['categories' => $data ]);


    

    //return view('articles.edit',['article'=>$article]);
   }

   public function update($id)
   {

    $validator=validator(request()->all(), [
        'title'=>'required',
        'body'=>'required',
        'category_id'=>'required'
    ]);

    if($validator->fails()){
return back()->withErrors($validator);
    }


    $article = Article::find($id);
    $article->title=request()->title;
    $article->body=request()->body;
    $article->category_id=request()->category_id;
    $article->save();

    return redirect("/articles/detail/$id");
   }


   public function delete($id)
   {

    

    $article=Article::find($id);
    if( Gate::allows('article-delete', $article) ) {
        $article->delete();
        return redirect('/articles')->with('info','Article deleted');
    } 
    else {
 return back()->with('error', 'Unauthorize');
    }


    


    
   }

   public function __construct()
 {
    $this->middleware('auth')->except(['index', 'detail']);
 }
 }
