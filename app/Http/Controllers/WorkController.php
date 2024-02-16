<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public  $tahun,
            $bulan;

    public function __construct()
    {
        $this->tahun = date('Y');
        $this->bulan = date('m');
    }
    public function index()
    {
        $work = Work::paginate(10);

        return view('pages.work.index', ['work' => $work]);
    }

    public function create()
    {
        $date = $this->tahun.$this->bulan;
        $count = Work::count();

        if($count == 0){
            $nomorDefault = '1002';
            $work_code = 'W'. $date . $nomorDefault;
        } else {
            $ambil = Work::all()->last();
            $nomorDefault = (int)substr($ambil->work_code,-4) + 1;
            $work_code = 'W'. $date . $nomorDefault;
        }
        return view('pages.work.create',['date' => $date, 'work_code' => $work_code]);
    }

    public function store(Request $request)
    {
        $work = Work::create($request->all());
        $work->work_code = $request->work_code;
        $work->name = $request->input('name');
        $work->save();

        toast('Pekerjaan Berhasil ditambahkan ', 'success')->position('top')->autoClose(5000);
        return redirect()->route('work.index');
    }

    public function edit($id)
    {
        $work = Work::where('id',$id)->first();

        return view('pages.work.edit', ['work' => $work]);
    }

    public function update(Request $request, $id)
    {
        $work = Work::where('id',$id)->first();
        $work->update($request->all());
        $work->work_code = $request->work_code;
        $work->name = $request->input('name');
        $work->save();

        toast('Pekerjaan Berhasil diupdate ', 'success')->position('top')->autoClose(5000);
        return redirect()->route('work.index');
    }

    public function destroy($id)
    {
        $work = Work::findOrFail($id);
        $work->delete();

        toast('Pekerjaan Berhasil dihapus ', 'success')->position('top')->autoClose(5000);
        return redirect()->route('work.index');
    }
}
