<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\SM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function sm()
    {
        $data = SM::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        return view('user.sm.index', compact('data'));
    }
    public function sm_create()
    {
        $rt = RT::get();
        return view('user.sm.create', compact('rt'));
    }
    public function sm_edit($id)
    {
        $data = SM::find($id);
        $rt = RT::get();
        return view('user.sm.edit', compact('data', 'rt'));
    }
    public function sm_delete($id)
    {
        $data = SM::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }
    public function sm_store(Request $req)
    {
        $check = SM::where('telp', $req->telp)->first();
        if ($check == null) {
            $n = new SM();
            $n->kecamatan_id = RT::find($req->rt_id)->kelurahan->kecamatan->id;
            $n->kelurahan_id = RT::find($req->rt_id)->kelurahan->id;
            $n->rt_id = $req->rt_id;
            $n->nik = $req->nik;
            $n->nama = $req->nama;
            $n->telp = $req->telp;
            $n->user_id = Auth::user()->id;
            $n->save();

            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/user/sm');
        } else {
            Session::flash('error', 'Telp ini sudah pernah di input');
            return back();
        }
    }
    public function sm_update(Request $req, $id)
    {
        $data = SM::find($id);
        $data->kecamatan_id = RT::find($req->rt_id)->kelurahan->kecamatan->id;
        $data->kelurahan_id = RT::find($req->rt_id)->kelurahan->id;
        $data->rt_id = $req->rt_id;
        $data->nik = $req->nik;
        $data->nama = $req->nama;
        $data->telp = $req->telp;
        $data->user_id = Auth::user()->id;
        $data->save();
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/user/sm');
    }
}
