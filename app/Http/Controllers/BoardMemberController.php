<?php

namespace App\Http\Controllers;

use App\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoardMemberController extends Controller
{
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'board_member_name' => 'required|max:80',
            'board_member_designation' => 'required|max:80',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $member = new BoardMember();
            $member->board_member_name = $request->board_member_name;
            $member->board_member_designation = $request->board_member_designation;

            if($member->save()){
                return response()->json(['status'=>true,'data' => $member]);
            }
        }
    }
    public function edit($id)
    {
        $data  = BoardMember::find($id);
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
            'board_member_name' => 'required|max:80',
            'board_member_designation' => 'required|max:80',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $member = BoardMember::find($request->category_id);
            $member->board_member_name = $request->board_member_name;
            $member->board_member_designation = $request->board_member_designation;

            if($member->save()){
                return response()->json(['status'=>true]);
            }
        }
    }


    public function destroy(Request $request){
        $member = BoardMember::find($request->id);
        if($member->delete()){
            return response()->json(['success'=>true,'data'=>$member]);
        }
    }


    public function viewBoardMember($id){
        $data=BoardMember::find($id);
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
