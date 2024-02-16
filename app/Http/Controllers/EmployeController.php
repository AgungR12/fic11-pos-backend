<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chef;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Repositories\UploadFile;
use Illuminate\Support\Facades\Redis;

class EmployeController extends Controller
{

    public function index(Request $request)
    {
        $employee = Chef::when($request->input('name'), function($query, $name){
            return $query->where('name', 'LIKE', '%'.$name.'%');
        })->orderBy('id','desc')->paginate(10);

        return view('pages.employee.index', ['employee' => $employee]);
    }

    public function create()
    {
        $work = Work::all();
        return view('pages.employee.create', ['work' => $work]);
    }

    public function store(Request $request)
    {
        $image = (new UploadFile())->uploadImageEmployee($request);
        $employee = Chef::create($request->all());
        $employee->image = $image;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->work = $request->work;
        $employee->twitter = $request->input('twitter');
        $employee->instagram = $request->input('instagram');
        $employee->facebook = $request->input('facebook');
        $employee->status = $request->status;
        $employee->save();

        toast('Karyawan Berhasil Ditambahkan', 'success')->position('top')->autoClose(5000);
        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $employee = Chef::where('id',$id)->first();
        $work = Work::all();
        return view('pages.employee.edit', ['employee' => $employee, 'work' => $work]);
    }

    public function update(Request $request, $id)
    {
        $employee = Chef::where('id',$id)->first();
        $employee->update($request->all());
        if($request->file('image')){
            $image = (new UploadFile())->updateImageCustomer($request);
        } else {
            $image = $employee->image;
        }
        $employee->image = $image;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->work = $request->work;
        $employee->twitter = $request->input('twitter');
        $employee->instagram = $request->input('instagram');
        $employee->facebook = $request->input('facebook');
        $employee->status = $request->status;
        $employee->save();

        toast('Karyawan Berhasil Diupdate', 'success')->position('top')->autoClose(5000);
        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = Chef::findOrFail($id);
        $employee->delete();

        toast('Karyawan Berhasil Dihapus ')->position('top')->autoClose(5000);
        return redirect()->route('employee.index');
    }
}
