<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;
use App\Model\Mutasi;
use Auth;
use Hash;
use Validator;

class UserController extends Controller
{
    public function topup(){
    	return view('user.topup');
    }
    public function withdraw(){
        $message = "";
    	return view('user.withdraw',compact('message'));
    }
    public function transfer(){
        $message = "";
        $rekening = "";
    	return view('user.transfer',compact('message','rekening'));
    }
    public function mutasi(){
    	$mutasi = Mutasi::where('user_id',Auth::user()->user_id)->get();
    	return view('user.mutasi',compact('mutasi'));
    }

    public function topupPost(Request $request){
        $last = Mutasi::where('deleted_at',NULL)->orderBy('mutasi_id','desc')->first();

        if($last == false){
            $no = 1;
        }
        else{
            $no = $last->mutasi_id + 1;
        }

        $mutasi = new Mutasi;
        $mutasi->user_id = Auth::user()->user_id;
        $mutasi->mutasi_code = $no;
        $mutasi->mutasi_date = date('Y-m-d H:i:s');
        $mutasi->mutasi_flag = 1;
        $mutasi->mutasi_status = 1;
        $mutasi->mutasi_jumlah = $request->topup;
        $mutasi->mutasi_saldo = Auth::user()->user_saldo + $request->topup;
        $mutasi->save();

        $update = User::where('user_id',Auth::user()->user_id)->update([
            'user_saldo' => $mutasi->mutasi_saldo
        ]);

        return redirect('mutasi');
    }
    public function withdrawPost(Request $request){
        if($request->withdraw > Auth::user()->user_saldo){
            $message = "Saldo Kurang";
            return view('user.withdraw',compact('message'));
        }
        else{
            $last = Mutasi::where('deleted_at',NULL)->orderBy('mutasi_id','desc')->first();

            if($last == false){
                $no = 1;
            }
            else{
                $no = $last->mutasi_id + 1;
            }

            $mutasi = new Mutasi;
            $mutasi->user_id = Auth::user()->user_id;
            $mutasi->mutasi_code = $no;
            $mutasi->mutasi_date = date('Y-m-d H:i:s');
            $mutasi->mutasi_flag = 2;
            $mutasi->mutasi_status = 1;
            $mutasi->mutasi_jumlah = $request->withdraw;
            $mutasi->mutasi_saldo = Auth::user()->user_saldo - $request->withdraw;
            $mutasi->save();

            $update = User::where('user_id',Auth::user()->user_id)->update([
                'user_saldo' => $mutasi->mutasi_saldo
            ]);

            return redirect('mutasi');
        }
    }
    public function transferPost(Request $request){
        if($request->transfer > Auth::user()->user_saldo){
            $message = "Saldo Kurang";
            $rekening = "";
            return view('user.transfer',compact('message','rekening'));
        }
        else{
            $last = Mutasi::where('deleted_at',NULL)->orderBy('mutasi_id','desc')->first();

            if($last == false){
                $no = 1;
            }
            else{
                $no = $last->mutasi_id + 1;
            }

            $mutasi = new Mutasi;
            $mutasi->user_id = Auth::user()->user_id;
            $mutasi->mutasi_code = $no;
            $mutasi->mutasi_date = date('Y-m-d H:i:s');
            $mutasi->mutasi_flag = 3;
            $mutasi->mutasi_status = 1;
            $mutasi->mutasi_jumlah = $request->transfer;
            $mutasi->mutasi_saldo = Auth::user()->user_saldo - $request->transfer;
            $mutasi->tujuan       = $request->no_rekening;
            $mutasi->save();

            $update = User::where('user_id',Auth::user()->user_id)->update([
                'user_saldo' => $mutasi->mutasi_saldo
            ]);

            return redirect('mutasi');
        }
    }
}