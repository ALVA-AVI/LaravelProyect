<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $categorias = Category::orderBy('id','DESC')->paginate(10);
        return view('admin.categoria.index',compact('categorias'));
    }
    public function create()
    {
        //
        return view('admin.categoria.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|unique:categories|max:190',
            'module'=>'required'
        ]);
        $categoria = new Category();
        $categoria->name=e($request->name);
        $categoria->module=e($request->module);
        $categoria->slug=Str::slug($request->name);
        $categoria->save();
        return redirect()->route('categories.create')->with('info',OK_IST);
    }
    public function modulo($module){
        $categorias = Category::where('module',$module)->orderBy('id','DESC')->paginate(10);
        return view('admin.categoria.index',compact('categorias'));
    }

    public function show(Category $category)
    {
        //
    }
    public function edit($id)
    {
        //
        $categoria = Category::where('id',$id)->firstOrFail();
        return view('admin.categoria.edit',compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=>'required|max:190',
            'module'=>'required'
        ]);
        $categoria = Category::findOrFail($id);
        $categoria->name=e($request->name);
        $categoria->module=e($request->module);
        $categoria->slug=Str::slug($request->name);
        $categoria->save();
        return redirect()->route('categories.index')->with('info',OK_UPT);
    }
    public function destroy($id)
    {
        //
        $categoria = Category::findOrFail($id)->delete();
        return back()->with('info',OK_DEL);
    }
}
