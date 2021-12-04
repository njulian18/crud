<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Subjects;

class SubjectsController extends Controller {

   public function index(){
      $subjects = Subjects::select('id','name','description')->get();
      return view('index')->with('subjects',$subjects);;
   }

   public function create(){
      return view('create');
   }

   public function store(Request $request){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:3',
         'description' => 'required|string|min:3',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }

      if($record = Subjects::firstOrCreate($data)){
         Session::flash('message', 'Cargado Correctamente!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('subjects');
      }else{
         Session::flash('message', 'No se cargo correctamente!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back();
   }  

   /*Update*/
   public function edit($id){
      $subject = Subjects::find($id);

      return view('edit')->with('subject',$subject);
   }

   public function update(Request $request,$id){
      $data = $request->except('_method','_token','submit');

      $validator = Validator::make($request->all(), [
         'name' => 'required|string|min:5',
         'description' => 'required|string|min:5',
      ]);

      if ($validator->fails()) {
         return redirect()->Back()->withInput()->withErrors($validator);
      }
      $subject = Subjects::find($id);

      if($subject->update($data)){

         Session::flash('message', 'Actualizado correctamente!');
         Session::flash('alert-class', 'alert-success');
         return redirect()->route('subjects');
      }else{
         Session::flash('message', 'Info no actualizada!');
         Session::flash('alert-class', 'alert-danger');
      }

      return Back()->withInput();
   }

   // Delete
   public function destroy($id){
      Subjects::destroy($id);

      Session::flash('message', 'Eliminado Correctamente!');
      Session::flash('alert-class', 'alert-success');
      return redirect()->route('subjects');
   }
} 
   
   

