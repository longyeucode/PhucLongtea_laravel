<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.index_category',compact('categories'));
    }

    public function create()
    {
        return view('admin.add_category');
    }


    public function store(Request $request)
    {
     
        try {
            Category::create($request->all());
             return redirect()->route('index_category')->with('success','Thêm mới thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Cập nhật không thành công !!!(Tên danh mục đã tồn tại)');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.edit_category',compact('categories','id') );
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        try {
            $categories->update($request->all());
             return redirect()->route('index_category')->with('success','cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Cập nhật không thành công !!!(Tên danh mục đã tồn tại)');
        }
    }

    public function destroy($id)
    {
        try {
            // Tìm và xóa đối tượng Category theo ID
            $category = Category::findOrFail($id);
            $category->delete();
              return redirect()->route('index_category')->with('success','Xóa thành công');
        } catch (\Throwable $th) {
          return redirect()->back()->with('error','Xóa không thành công !!!');
        }
    }
    
}
