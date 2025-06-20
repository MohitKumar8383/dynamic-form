<?php

namespace App\Http\Controllers;

use App\Models\CustomFormField;
use Illuminate\Http\Request;
use DB; 

class CustomFormFieldController extends Controller
{

    public function addcustomformfield(Request $request){
        $data['view'] = 'Customformfield/form';
        return AdminView($data);
    }

    public function storecustomformfield(Request $request){
        $request->validate([
            'label' => 'required',
            'name' => 'required|unique:custom_form_fields',
            'type' => 'required',
            'is_required' => 'required',
            'show_in_table' => 'required',
            'use_in_filter' => 'required',
        ]);
        $data = $request->all();
        $data = $request->except('_token');
        $insert = new CustomFormField();
        $insert->label = ucwords($request->label);
        $insert->name = $request->name;
        $insert->type = $request->type;
        $insert->is_required = $request->is_required;
        $insert->show_in_table = $request->show_in_table;
        $insert->use_in_filter = $request->use_in_filter;
        $insert->order = $request->order;
        $insert->fields =  json_encode($data);
        $insert->status = 1;
        if($insert->save()){
            return redirect()->route('formfieldtable')->with('success','Data add successfully');
        }else{
            return redirect()->route('addcustomformfield')->with('error','Something went wrong');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data']['formfields'] = CustomFormField::orderBy('order','ASC')->get(['id','label','name','type','is_required','show_in_table','use_in_filter','order','status','created_at']);
        $data['view'] = 'Customformfield/table';
        return AdminView($data);
    }

    public function UpdateFieldOrder(Request $request){
        if(isset($request['order']) && !empty($request['order'])){
            foreach($request['order'] as $key => $value){
                $update = CustomFormField::where('id',$value['id'])->first();
                $update->order = $value['order'];
                $update->update();
            }
            echo "Updated";
        }
    }

    public function status_change(Request $request){
        if($_POST['status_type'] == "active"){
            $status = 0;
        }else{
            $status = 1;
        }
        $data = DB::table($_POST['table_name'])
                    ->where('id', $_POST['id'])
                    ->update([
                        'status' => $status
                    ]);
        if($data){
            echo json_encode(['status'=>true]);
        }else{
            echo json_encode(['status'=>false]);
        }
    }

    public function FieldDelete($id){
        $check = CustomFormField::where('id',$id);
        if($check->exists()){
            if($check->delete()){
                return redirect()->route('formfieldtable')->with('success','Data delete successfully');
            }
        }else{
            return redirect()->route('formfieldtable')->with('error','id not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomFormField $customFormField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomFormField $customFormField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomFormField $customFormField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomFormField $customFormField)
    {
        //
    }
}
