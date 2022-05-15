<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPermission;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller

{
    public function __construct()
    {
//        $this->authorizeResource(Category::class,'category');
//        $this->middleware(CheckPermission::class . ":read_category")
//            ->only('index');

//        $this->middleware(CheckPermission::class . ":create_category")
//            ->only(['create','store']);

//        $this->middleware(CheckPermission::class . ":update_category")
//            ->only(['edit','update']);

//        $this->middleware(CheckPermission::class . ":delete_category")
//            ->only('destroy');
    }
    public function index()
    {

 //    $this->authorize('read_category');
        return view('categories.index',[

            'categories'=>Category::all()
        ]);
    }


    public function create()
    {
//        if (\Illuminate\Support\Facades\Gate::denies('create_category')){
//        abort('403');
//        }
    //    $this->authorize('create_category');
        return view('categories.create');
    }

    public function store(NewCategoryRequest $request)
    {
        Category::query()->create([
        'title'=>$request->get('title')

            ]);
        return redirect('/');
    }



    public function Edit(Category $category)
    {
         $this->authorize('update_category',$category);
//        if (\Illuminate\Support\Facades\Gate::denies('update_category',$category)){
//            abort('403');
//        }
   //     \Illuminate\Support\Facades\Gate::authorize('edit_category',$category);

       return view('categories.edit',[
          'category'=>$category
       ]);
    }

    public function Update(UpdateCategoryRequest $request, Category $category)
    {
      $titleExists = Category::query()->where('title',$request->get('title'))
          ->where('id','!=',$category->id)
          ->exists();
        if ($titleExists){
            return redirect()->back()->withErrors(['title'=>'title already been used']);
        }
        $category->update([
           'title'=>$request->get('title')
        ]);
        return redirect('/categories');
    }
    public function destroy(Category $category)
    {
    //    $this->authorize('delete_category',$category);
      //  \Illuminate\Support\Facades\Gate::authorize('delete_category',$category);
        $category->delete();
    return redirect('/categories');
    }
}
