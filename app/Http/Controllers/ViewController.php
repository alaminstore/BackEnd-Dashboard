<?php

namespace App\Http\Controllers;

use App\BoardMember;
use App\Client;
use App\ClientCategories;
use App\EthicalCode;
use App\Event;
use App\FounderSpeech;
use App\Job;
use App\jobs;
use App\MainOffice;
use App\MessageView;
use App\NEWS;
use App\Office;
use App\Service;
use App\SocialMedia;
use App\SubService;
use App\TermsPolicy;
use App\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.default');
    }
    public function resetView(){
        return view('backend.settings.passwordChange');
    }
    public function profileView(){
        return view('backend.profile.profile');
    }

    public function oldPass(Request $request){
        $request->validate([
            'oldpass' => 'required|string',
        ]);
        // $oldPass = bcrypt($request->oldpass);
        $oldPass = $request->oldpass;
        $user = Auth::user();
        $userInfo = $user->password;
        if($userInfo){
           if(Hash::check($request->oldpass, $userInfo)){
            return response()->json(['success'=>true]);
           }else{
            return response()->json(['success'=>false]);
           }
        }
    }

    public function newPass(Request $request){
        $validator = Validator::make($request->all(),[
            'newPass' => 'required|string|min:8',
            'confirmPass' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $user = Auth::user();
            $available = $user->id;
            if($available){
                $newpass = $request->newPass;
                $confirmpass = $request->confirmPass;
                if($newpass == $confirmpass ){
                    $user->password = bcrypt($newpass);
                    // dd($newpass);
                    $user->save();
                    // $pass = $request->newPass;
                    return response()->json([
                        'success'=>true,
                    ]);
                }else{
                    return response()->json(['success'=>false]);
                }
            }
        }

    }

    public function profileUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=> 0,'error'=>$validator->errors()->toArray()]);
        }else{
            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->hasFile('image')) {
                $path = 'images/users/';
                @unlink($user->image);
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $image = $request->image;
                $imageName = rand(100, 1000) . $image->getClientOriginalName();

                $image->move($path, $imageName);
                $user->image = $path . $imageName;
            }
            if($user->save()){
                return response()->json(['status'=>true]);
            }
        }

    }

    // All page view link=========================================================================

    public function socialMedia(){
        $medias = SocialMedia::all();
        return view('backend/socialmedia/social_media',compact('medias'));
    }
    // public function boardMember(){
    //     $medias = SocialMedia::all();
    //     return view('backend/socialmedia/social_media',compact('medias'));
    // }
    // public function jobs(){
    //     $jobs = Job::all();
    //     return view('backend.careers.job',compact('jobs'));
    // }
    public function userManagement(){
        $userLists = User::where('id', '!=', Auth::id())->get();
        return view('backend.userManagement.usermanagement',compact('userLists'));
    }
    public function clientCat(){
        $clientcat = ClientCategories::all();
        return view('backend.clients.clientcat',compact('clientcat'));
    }
    public function client(){
        $clients = Client::with('getClientCat')->get();
        $clientcat = ClientCategories::all();
        return view('backend.clients.client',compact('clients','clientcat'));
    }
    public function boardMember(){
        $members = BoardMember::all();
        return view('backend.aboutus.boardmember',compact('members'));
    }
    public function founderSpeech(){
        $founders = FounderSpeech::all();
        return view('backend.aboutus.founderspeech',compact('founders'));
    }
    public function termsPolicies(){
        $terms = TermsPolicy::all();
        return view('backend.aboutus.termspolicies',compact('terms'));
    }
    public function ethicalCode(){
        $ethicals = EthicalCode::all();
        return view('backend.aboutus.ethicalcode',compact('ethicals'));
    }
    public function news(){
        $news = NEWS::all();
        return view('backend.news_event.news',compact('news'));
    }
    public function events(){
        $events = Event::all();
        return view('backend.news_event.event',compact('events'));
    }
    public function offices(){
        $offices = Office::all();
        return view('backend.contacts.offices',compact('offices'));
    }
    public function mainOffice(){
        $offices = MainOffice::all();
        return view('backend.contacts.main_office',compact('offices'));
    }
    public function message(){
        $messages = MessageView::all();
        return view('backend.contacts.message',compact('messages'));
    }
    public function services(){
        $services = Service::all();
        return view('backend.services.services',compact('services'));
    }
    public function subServices(){
        $sub_services = SubService::with("getService")->get();
        $servicesList = Service::all();
        return view('backend.services.sub_services',compact('sub_services','servicesList'));
    }
    public function profileEdit($id)
    {
        $data  = User::find($id);
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
