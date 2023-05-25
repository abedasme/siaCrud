<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Member; //add Member Models
 
class MemberController extends Controller
{
    public function index(){
        return view('show');
    }
 
    public function getMembers(){
        $members = Member::all();
 
        return view('show')->with('members', $members);
    }
 
    public function save(Request $request){
        $member = new Member;
        $member->firstname = $request->input('firstname');
        $member->lastname = $request->input('lastname');
        $member->gender = $request->input('gender', 'male'); // Set default value to 'male' if no gender is selected
        $member->birthdate = $request->input('birthdate');
        $member->save();
 
        return redirect('/');
    }
 
    public function update(Request $request, $id){
        $member = Member::find($id);
        $input = $request->all();
        $member->fill($input)->save();
 
        return redirect('/');
    }
 
    public function delete($id)
    {
        $members = Member::find($id);
        $members->delete();
  
        return redirect('/');
    }
}