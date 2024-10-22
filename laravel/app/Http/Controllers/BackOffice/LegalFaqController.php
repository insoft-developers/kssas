<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalFaq;
use App\Models\Setting;
use DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class LegalFaqController extends Controller
{
    public function apiLegalFaq() {
        $data = LegalFaq::all();
        return Datatables::of($data)
            ->addColumn('action', function($data){
                return '<center><a onclick="editForm('. $data->id.')" style="width:80px;margin-bottom:3px;" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<br><a onclick="deleteData('. $data->id.')" style="width:80px;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a></center>';
            })->rawColumns(['action','pertanyaan','jawaban'])->make(true); 
    }
    
    
    public function index()
    {
        $auth  = \App\Models\Jabatan::findorFail(Auth::user()->level); 
        if($auth->legal != 1) {
            return Redirect('/backoffice');
        }
        $view = 'backoffice-legalfaq';
        $setting = Setting::findorFail(1);
        return view('backend.legalfaq', compact('view','setting'));
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
        LegalFaq::create($input);

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
        $data = LegalFaq::findorFail($id);
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
        $data = LegalFaq::findorFail($id);
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
        LegalFaq::destroy($id);

        return response()->json([
            'success'=>true
        ]);
    }
}