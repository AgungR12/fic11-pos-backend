<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\ProductModel;
use App\Repositories\UploadFile;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::paginate(10);
        return view('pages.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $newName = (new UploadFile())->uploadImage($request);

        $data = $request->all();
        $products = ProductModel::create($data);
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->stock = $request->input('stock');
        $products->category = $request->category;
        $products->image = $newName;
        $products->description = $request->input('description');
        $products->save();

        // dd($request->file('image'));
        toast('Product successfully created','success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $products = ProductModel::findOrFail($id);
        return view('pages.products.edit', ['products' => $products]);
    }

    public function update(Request $request, ProductModel $product )
    {
        $image = (new UploadFile())->updateImageAll($request);
        $data = $request->all();
        $product->update($data);
        // dd($product);
        toast('Product successfully updated', 'success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
        // dd($request->all());
    }

    public function destroy(ProductModel $product)
    {
        $product->delete();
        // toast('Product successfully deleted', 'success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
    }
}
