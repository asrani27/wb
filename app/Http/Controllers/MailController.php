<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Data;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function index(Request $req)
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

        $details = [
            'title' => 'Email Dari whistleblower.banjarmasinkota.go.id',
            'body' => 'Di Bawah Ini merupakan Data Aduan :',
            'nip' => $req->nip == null ? '-' : $req->nip,
            'nama_lengkap' => $req->nama_lengkap == null ? '-' : $req->nama_lengkap,
            'telp' => $req->telp == null ? '-' : $req->telp,
            'email' => $req->email == null ? '-' : $req->email,
            'aduan' => $req->aduan == null ? '-' : $req->aduan,
            'bukti' => $req->file == null ? '-' : 'https://whistleblower.banjarmasinkota.go.id/storage/filewb/' . $filename
        ];

        \Mail::to('mtaufikrivani.itko@gmail.com')->send(new \App\Mail\MailNotify($details));

        Session::flash('success', 'Aduan Telah Dikirim');
        return redirect('/');
    }
}
