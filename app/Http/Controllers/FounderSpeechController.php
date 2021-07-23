<?php

namespace App\Http\Controllers;

use App\FounderSpeech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FounderSpeechController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'designation' => 'required|max:80',
            'description' => 'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $founder = new FounderSpeech();
            $founder->designation = $request->designation;
            $founder->description = $request->description;

            if($founder->save()){
                return response()->json(['status'=>true,'data' => $founder]);
            }
        }
    }
    public function edit($id)
    {
        $data  = FounderSpeech::find($id);
        if($data){
        $data['tags'] = $data->getTag;
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'No information found'
            ]);
        }
    }

    public function updated(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'designation' => 'required|max:80',
            'description' => 'required',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $founder = FounderSpeech::find($request->category_id);
            $founder->designation = $request->designation;
            $founder->description = $request->description;
            if($founder->save()){
                return response()->json(['status'=>true]);
            }
        }
    }


    public function destroy(Request $request){
        $founder = FounderSpeech::find($request->id);
        if($founder->delete()){
            return response()->json(['success'=>true,'data'=>$founder]);
        }
    }

    public function viewFounderSpeech($id){
        $data=FounderSpeech::find($id);
        if($data){
          return response()->json([
              'success' => true,
              'data' => $data
            ]);
        }
        else{
          return response()->json([
              'success' => false,
              'data' => 'No information found'
            ]);
        }
    }
}
