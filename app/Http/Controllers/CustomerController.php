<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Repositories\UploadFile;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customers::when($request->input('name_customer'), function($query, $name_customer){
            return $query->where('name_customer', 'like', '%'. $name_customer.'%');
        })->orderBy('id','desc')->paginate(10);
        return view('pages.customer.index', ['customers' => $customers]);
    }

    public function show($id)
    {
        $customer = Customers::findOrFail($id);
        return view('pages.customer.show-customer', ['customer' => $customer]);
    }

    public function create()
    {
        $work = Work::all();
        return view('pages.customer.create-customer', ['work' => $work]);
    }

    public function store(Request $request)
    {
        $image = (new UploadFile())->uploadImageCustomer($request);
        $customers = Customers::create($request->all());
        $customers->name_customer = $request->input('name_customer');
        $customers->email = $request->email;
        $customers->job = $request->job;
        $customers->subject = $request->input('subject');
        $customers->message = $request->message;
        $customers->image = $image;
        $customers->type = $request->type;
        $customers->save();

        toast('Pesan Komentar Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('comments.index');
    }

    public function edit($id)
    {
        $work = Work::all();
        $customer = Customers::where('id', $id)->first();
        return view('pages.customer.edit-customer', ['customer' => $customer, 'work' => $work]);
    }

    public function update(Request $request, $id)
    {

        // if($request->file('image')){
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     $image = $request->name.'-'.now()->timestamp.'.'.$extension;
        //     $request->file('image')->storeAs('photo', $image);
        //     $request['image'] = $image;
        // }

        $customer = Customers::where('id', $id)->first();
        $customer->update($request->all());
        if($request->file('image')){
            $image = (new UploadFile())->uploadImageCustomer($request);
        } else {
            $image = $customer->image;
        }
        $customer->name_customer = $request->input('name_customer');
        $customer->email = $request->email;
        $customer->job = $request->job;
        $customer->subject = $request->input('subject');
        $customer->message = $request->message;
        $customer->image = $image;
        $customer->type = $request->type;
        $customer->save();

        // dd($customer);
        toast('Pesan Komentar Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('comments.index');
    }

    public function destroy($id)
    {
        $customer = Customers::findOrFail($id);
        $customer->delete();
        toast('Pesan Komentar Berhasil Dihapus', 'success')->position('top')->autoClose(5000);
        return redirect()->route('comments.index');
    }


}
