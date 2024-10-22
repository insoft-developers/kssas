<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Loan;
use App\Models\Saving;
use App\Models\Simpanan;
class HomeController extends Controller
{
    
    
    public function index() {
        $view = 'bo-dashboard';
        $setting = Setting::findorFail(1);
        $pendaftaran = Customer::where('is_active', '!=', 1)->count();
        $anggota = Customer::where('is_active', 1)->count();
        $loan = Loan::where('status_loan', 1)->count();
        $withdraw = Simpanan::where('status',1)->count();
        
        $tahun = date('Y');
        
        $wd1 = Simpanan::where('status',3)->whereMonth('created_at', '01')->whereYear('created_at', $tahun)->sum('amount');
        $wd2 = Simpanan::where('status',3)->whereMonth('created_at', '02')->whereYear('created_at', $tahun)->sum('amount');
        $wd3 = Simpanan::where('status',3)->whereMonth('created_at', '03')->whereYear('created_at', $tahun)->sum('amount');
        $wd4 = Simpanan::where('status',3)->whereMonth('created_at', '04')->whereYear('created_at', $tahun)->sum('amount');
        $wd5 = Simpanan::where('status',3)->whereMonth('created_at', '05')->whereYear('created_at', $tahun)->sum('amount');
        $wd6 = Simpanan::where('status',3)->whereMonth('created_at', '06')->whereYear('created_at', $tahun)->sum('amount');
        $wd7 = Simpanan::where('status',3)->whereMonth('created_at', '07')->whereYear('created_at', $tahun)->sum('amount');
        $wd8 = Simpanan::where('status',3)->whereMonth('created_at', '08')->whereYear('created_at', $tahun)->sum('amount');
        $wd9 = Simpanan::where('status',3)->whereMonth('created_at', '09')->whereYear('created_at', $tahun)->sum('amount');
        $wd10 = Simpanan::where('status',3)->whereMonth('created_at', '10')->whereYear('created_at', $tahun)->sum('amount');
        $wd11 = Simpanan::where('status',3)->whereMonth('created_at', '11')->whereYear('created_at', $tahun)->sum('amount');
        $wd12 = Simpanan::where('status',3)->whereMonth('created_at', '12')->whereYear('created_at', $tahun)->sum('amount');
        
        $l12 = Loan::where('status_loan',3)->whereMonth('created_at', '12')->whereYear('created_at', $tahun)->sum('sisa_dibayar');
        
       
        return view('backend.dashboard', compact('view','setting','pendaftaran','anggota','loan','withdraw','wd1','wd2','wd3','wd4','wd5','wd6','wd7','wd8','wd9','wd10','wd11','wd12','l12'));    
    }
    
}
