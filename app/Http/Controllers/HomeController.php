<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Lurah;
use App\Models\Kecamatan;
use App\Models\Tpermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function superadmin()
    {
        return view('admin.home');
    }

    public function wb(Request $req)
    {
        $param = $req->all();
        if ($req->file == null) {
            $filename = null;
        } else {
            $extension = $req->file->getClientOriginalExtension();
            if ($extension == 'php') {
                Session::flash('error', 'Tidak Bisa Upload File PHP');
                return back();
            } else {
                $filename = uniqid() . '.' . $extension;
                $image = $req->file('file');
                $realPath = public_path('storage') . '/filewb';
                $image->move($realPath, $filename);
            }
        }
        $param['file'] = $filename;

        Data::create($param);

        Session::flash('success', 'Berhasil Di kirim');
        return redirect('/');
    }
}
