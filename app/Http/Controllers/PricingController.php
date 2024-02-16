<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = Pricing::paginate(10);
        return view('pages.pricing.index', ['pricing' => $pricing]);
    }

    public function create()
    {
        return view('pages.pricing.create-pricing');
    }

    public function store(Request $request)
    {
        $pricing = Pricing::create($request->all());
        $pricing->package_name = $request->input('package_name');
        $pricing->price = $request->input('price');
        $pricing->nominal = $request->nominal;
        $pricing->warranty = $request->input('warranty');
        $pricing->status = $request->status;
        $pricing->save();

        toast('Paket Harga Berhasil DItambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('pricing.index');
    }

    public function edit($id)
    {
        $pricing = Pricing::findOrFail($id);
        return view('pages.pricing.edit-pricing', ['pricing' => $pricing]);
    }

    public function update(Request $request, $id)
    {
        $pricing = Pricing::where('id', $id)->first();
        $pricing->update($request->all());
        $pricing->package_name = $request->input('package_name');
        $pricing->price = $request->input('price');
        $pricing->nominal = $request->nominal;
        $pricing->warranty = $request->input('warranty');
        $pricing->calender = $request->input('calender');
        $pricing->status = $request->status;
        $pricing->save();

        toast('Paket Harga Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('pricing.index');
    }

    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();

        toast('Harga Paket Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('pricing.index');
    }
}
