<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
        //Get user credentials
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
            $id = $request->logCode;
            
        //Authentication Login
        if ($id == 1) {
            $login = DB::table('masyarakats')
            ->where('username', $request->username)
            ->get();
        }
        else if ($id == 2) {
            $login = DB::table('petugas')
            ->join('levels','levels.id_level','=','petugas.id_level')
            ->where('username', $request->username)
            ->get();
        }

        //Auth Condition
        if ($id == 1) {
            foreach ($login as $dataLog) {
                $unameLog = $dataLog->nama_lengkap;
                $passlog = $dataLog->password;
            }
        }

        if ($id == 2) {
            foreach ($login as $dataLog) {
                $unameLog = $dataLog->nama_petugas;
                $levelLog = $dataLog->level; 
                $passlog = $dataLog->password;
            }
        }
        
        if (Crypt::decryptString($passlog) == $request->password) {
            $request->session()->put('userlogin', $unameLog);
            if ($id == 1) {
                return redirect('/');
            } else {
                $request->session()->put('userlevel', $levelLog);
                return redirect('/');
            } 
        }

        return redirect('/');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/');
    }
}