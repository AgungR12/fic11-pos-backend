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
        $products = ProductModel::orderBy('id','desc')->paginate(10);
        return view('pages.products.index', ['products' => $products]);
    }

    public function indexFood()
    {
        $foods = ProductModel::where('category', 'food')->orderBy('id','desc')->paginate(10);
        return view('pages.products.food', ['foods' => $foods]);
    }

    public function indexDrink()
    {
        $drinks = ProductModel::where('category', 'drink')->orderBy('id','desc')->paginate(10);
        return view('pages.products.drink', ['drinks' => $drinks]);
    }

    public function indexSnack()
    {
        $snacks = ProductModel::where('category', 'snack')->orderBy('id','desc')->paginate(10);
        return view('pages.products.snack', ['snacks' => $snacks]);
    }

    public function show($id)
    {
        $product = ProductModel::where('id', $id)->first();

        return view('pages.products.show', ['product' => $product]);
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
        toast($request->input('name').' Berhasil di tambahkan','success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $products = ProductModel::findOrFail($id);
        return view('pages.products.edit', ['products' => $products]);
    }

    public function update(Request $request, $id)
    {
        // Delete to image old
        // if($product->image ){
        //     unlink(public_path('images'. $product->image));
        // }


        $product = ProductModel::where('id', $id)->first();
        if($request->file('image')){
            // $extension = $request->file('image')->getClientOriginalExtension();
            // $image = $request->name.'-'.now()->timestamp.'.'.$extension;
            // $request->file('image')->storeAs('image', $image);
            // $request['image'] = $image;
            $image = (new UploadFile())->updateImageAll($request);
        } else {
            $image = $product->image;
        }
        // $image = $product['image'];
        $data = $request->all();
        $product->update($data);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->image = $image;
        $product->category = $request->category;
        $product->description = $request->input('description');
        $product->save();
        // dd($product);
        toast($request->input('name').' Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
        // dd($request->all());
    }

    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->delete();
        // $products = ProductModel::findOrFail($id);
        // $products->delete();
        toast('Product Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('products.index');
    }
}
