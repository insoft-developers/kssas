<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Imports\SavingImport;
use Illuminate\Http\Request;
use App\Models\Saving;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SavingController extends Controller

{
    public function apiSaving() {
        $data = Saving::all();
        return DataTables::of($data)
            ->addColumn('created_at', function($data){
                return '<div style="text-align:center;">'.date('d-m-Y', strtotime($data->created_at)).'</div>';
            })
            ->addColumn('amount_in', function($data){
                return '<div style="text-align:right;">'.number_format($data->amount_in).'</div>';
            })
            ->addColumn('amount_out', function($data){
                return '<div style="text-align:right;">'.number_format($data->amount_out).'</div>';
            })
            ->addColumn('customer_id', function($data){
                $cust = \App\Models\Customer::where('id', $data->customer_id);
                if($cust->count() > 0) {
                    return $cust->first()->nama;
                } else {
                    return 'not-found';
                }
                
            })
            ->addColumn('product_id', function($data){
               
                $prod = \App\Models\Product::where('id', $data->product_id);
                if($prod->count() > 0) {
                    return $prod->first()->product_name;
                } else {
                    return 'not-found';
                }
            })
            ->addColumn('status', function($data){
                if($data->status == 1) {
                    return '<center><span class="badge-success">Selesai</span></center>';
                } else {
                    return '<center><span class="badge-danger">review</span></center>';
                }
                
            })
            ->addColumn('action', function($data){
                if($data->status == 1) {
                    return '<center>'.
                    '<a onclick="approveForm('. $data->id.')" disabled style="width:25px;margin-right:5px;" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-check"></i></a>'.
                    '<a onclick="editForm('. $data->id.')" disabled style="width:25px;margin-right:5px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'.
                    '<a onclick="deleteData('. $data->id.')" disabled style="width:25px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a></center>';
                } else {
                    return '<center>'.
                    '<a title="approve data" onclick="approveForm('. $data->id.')" style="width:25px;margin-right:5px;" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-check"></i></a>'.
                    '<a onclick="editForm('. $data->id.')" style="width:25px;margin-right:5px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i></a>'.
                    '<a onclick="deleteData('. $data->id.')" style="width:25px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a></center>';
                }
                
            })->rawColumns(['action','customer_id','product_id','amount_in','amount_out','created_at','status'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->simpanan != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-saving';
        $setting = Setting::findorFail(1);
        $customer = Customer::where('is_active', 1)->get();
        $product = Product::where('product_category', 1)->get();
        return view('backend.saving', compact('view','setting','customer','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Saving::create($input);

        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Saving::findorFail($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Saving::findorFail($id);
        $input = $request->all();
       
        $data->update($input);
        
        return response()->json([
            'success'=>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Saving::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
    
    
    
    public function uploadSimpanan()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->simpanan != 1) {
            return Redirect('/backoffice');
        }
        
        $view = 'backoffice-upload-simpanan';
        $setting = Setting::findorFail(1);
        $upload = DB::table('savings')->get();
        return view('backend.upload_simpanan', compact('view','setting', 'upload'));
    }
    
    
    public function importDataSimpanan(Request $request) {
        try {
            Excel::import(new SavingImport, $request->file);
            Session::flash('sukses','Excel file Sukses Diupload...');
		    return redirect('upload_simpanan');
        } catch(\Exception $e) {
            Session::flash('gagal',$e->getMessage());
		    return redirect('upload_simpanan');
        }
        
    }
    
    
    public function saving_approve(Request $request) {
        $input = $request->all();
        $data = Saving::findorFail($input['id']);
        $data->status = 1;
        $data->save();
        return response()->json([
            'success'=>true
        ]);
        
    }
}
