<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Tinify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use App\Page;
use App\PageImg;
use App\Team;
use App\Client;
use App\Career;
use App\Apply;
use App\Work;
use App\WorkFile;
use App\User;
use App\Slider;
use App\AddressMap;
use App\WorkFileMeta;
use App\WorkfileImg;
use App\WorkfileType;



class BackendController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

// Dashboard-area-------------------->>>>
     public function dashboardhome()
    {
        $data['title'] = 'Homepage';

        $data['totalAdmins'] = User::all()->count();
        $data['totalClients'] = Client::all()->count();
        $data['totalTeams'] = Team::all()->count();
        $data['totalWorks'] = Work::all()->count();
        $data['totalAppliers'] = Apply::all()->count();

        return view('backend.dashboardhome',$data);
    }


// Admins-area-------------------->>>>
    public function addAdmin()
    {
        $data['title'] = "Add Admin user";
        $data['route'] = "post-admin";
        return view('backend.register-admin', $data);
    }

    public function postAdmin(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin['name'] = $request->name;
        $admin['email'] = $request->email;
        $admin['password'] = Hash::make($request->password);

        User::create($admin);
        session()->flash('message', 'Admin Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allAdmins()
    {
        $data['title'] = "All Admins";
        $data['eroute'] = "edit-admin";
        $data['droute'] = "delete-admin";
        $data['admins'] = User::orderBy('id', 'desc')->paginate(10);
        return view('backend.all-admin', $data);
    }

    public function editAdmin($id) {

        $data['title'] = "Edit Admin";
        $data['uroute'] = "update-admin";
        $data['admin'] = User::findOrFail($id);
        return view('backend.edit-admin', $data);
    }

    public function updateAdmin($id, Request $request) {


        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            session()->flash('message', 'Your current password does not matches with the password you provided. Please try again.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Current password and new password are same
            session()->flash('message', 'New Password cannot be same as your current password. Please choose a different password.');
            Session::flash('type', 'warning');
            return redirect()->back();
        }
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',

            'name' => 'required|string|max:255',
            'email' => 'required',
        ]);


        $admin = User::findOrFail($id);

        $admin['name'] = $request->name;
        $admin['email'] = $request->email;

        $admin = Auth::user();
        $admin->password = bcrypt($request->get('password'));

        $admin->save();


        session()->flash('message', 'Admin SuccessFully Updated!');
        Session::flash('type', 'success');

        return redirect()->route('all-admins');

    }

    public function deleteAdmin($id) {

        $user = User::findOrFail($id);
        $cid = Career::whereAdminId($id)->delete();
        $clid = Client::whereAdminId($id)->delete();
        $pImgid = PageImg::whereAdminId($id)->delete();
        $pid = Page::whereAdminId($id)->delete();
        $tid = Team::whereAdminId($id)->delete();
        $wfid = WorkFile::whereAdminId($id)->delete();
        $wid = Work::whereAdminId($id)->delete();


        if (Auth::user()->id == $user->id) {
   
        session()->flash('message', 'Opps! Sorry You Cant Delete Your Own Information!');
        Session::flash('type', 'warning');
        return redirect()->back();
        }else{
            $user->delete();
            session()->flash('message', 'Admin SuccessFully Deleted!');
            Session::flash('type', 'success');
            return redirect()->back();
        }
               
    }

// Pages-area-------------------->>>>

    public function addPage()
    {
    	$data['title'] = 'Add Page';
    	$data['aroute'] = "post-page";
    	$data['hasCats'] = 0;
         $data['drpDwn'] = 0;
      
        return view('backend.add-page', $data);
    }

    public function postPage(Request $request)
    {
       $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
        
        ]);

        $uid = Auth::user()->id;

        $title = preg_replace('!\s+!', ' ', $request->title);

        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        $slug = $title;

        $count = 0;
        $tcount = 1;

        while ($count < 1) {
            $hasSlug = Page::whereSlug($slug)->first();

            if ($hasSlug) {
             $newtitle =$title.'-'.$tcount; 
             $slug = $newtitle; 
             $tcount++;
            }else{
                $count++;
            }
        }

        $page['slug'] = $slug;
        $page['title'] = $request->title;
        $page['details'] = $request->details;
		$page['admin_id'] = $uid;

        Page::create($page);
        session()->flash('message', 'Page succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allPages() {
        $data['title'] = "All Pages";
        $data['editroute'] = "edit-page";
        $data['droute'] = "delete-page";
        $data['dallroute'] = "delete-all-page";
        $data['hasCats'] = 0;
        $data['news'] = Page::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-pages', $data);
    }

    public function editPage($id) {

        $data['title'] = 'Edit Page';
        $data['route'] = 'update-page';
        $data['hasCats'] = 0; 
        $data['news'] = Page::whereId($id)->first();

        return view('backend.edit-page', $data);
    }

    public function updatePage($id, Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|min:5',

        ]);
        $news = Page::findOrFail($id);

        $uid = Auth::user()->id;

        $news['title'] = $request->title;
        $news['details'] = $request->details;

        $news->save();

        session()->flash('message', 'Page succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deletePage($id) {

        $page = Page::findOrFail($id);
        $page->delete();

        session()->flash('message', 'Page SuccessFully Deleted!');
        Session::flash('type', 'success');

        return redirect()->back();
    }


    public function deleteAllPage() {

        $dPage = Page::all();
        $dPage = Page::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Page File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

// Principles-area-------------------->>>>

    public function addPrinciple()
    {
    	$data['title'] = 'Add Principle';
    	$data['aroute'] = "post-principle";
    	$data['hasCats'] = 1;
        $data['drpDwn'] = 0;

        return view('backend.add-page', $data);
    }

    public function postPrinciple(Request $request)
    {

        $messages = [
         
            'img.max' => 'You mustbe upload maximum (5mb) image file!',
        ];
        $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        
        ],$messages);

       $uid = Auth::user()->id;

        if ($request->img) {

        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname . '.' . $request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = PageImg::whereImg($img)->first();
            if ($hasImg) {
                $newimgname = $imgname . '_' . $imgcount;
                $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                $imgcount++;
            } else {
                $count++;
            }
        }

        $request->img->move(public_path('img/pageimg/'), $img);


        $princ['img'] = $img;
    }

        $title = preg_replace('!\s+!', ' ', $request->title);

        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        $slug = $title;

        $count = 0;
        $tcount = 1;

        while ($count < 1) {
            $hasSlug = PageImg::whereSlug($slug)->first();

            if ($hasSlug) {
             $newtitle =$title.'-'.$tcount; 
             $slug = $newtitle; 
             $tcount++;
            }else{
                $count++;
            }
        }

        $princ['slug'] = $slug;
        $princ['title'] = $request->title;
        $princ['details'] = $request->details;
		$princ['admin_id'] = $uid;

        PageImg::create($princ);
        session()->flash('message', 'Principle Page succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allPrinciple() {
        $data['title'] = "All Principle Pages";
        $data['editroute'] = "edit-principle";
        $data['droute'] = "delete-principle";
        $data['dallroute'] = "delete-all-principle";
        $data['hasCats'] = 0;
        $data['news'] = PageImg::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-pages', $data);
    }

    public function editPrinciple($id) {

        $data['title'] = 'Edit Principle Page';
        $data['route'] = 'update-principle';
        $data['hasCats'] = 1;
        $data['news'] = PageImg::whereId($id)->first();

        return view('backend.edit-page', $data);
    }

    public function updatePrinciple($id, Request $request) {

        $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        
        ]);

        $uprinc = PageImg::findOrFail($id);        
        if ($request->img) {

        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname . '.' . $request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = PageImg::whereImg($img)->first();
            if ($hasImg) {
                $newimgname = $imgname . '_' . $imgcount;
                $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                $imgcount++;
            } else {
                $count++;
            }
        }

        $request->img->move(public_path('img/pageimg/'), $img);
        $uprinc['img'] = $img;
    }
        $uprinc['title'] = $request->title;
        $uprinc['details'] = $request->details;

        $uprinc->save();

        session()->flash('message', 'Principle Page succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deletePrinciple($id) {

        $dprinc = PageImg::findOrFail($id);
        unlink(public_path() .  '/img/pageimg/' . $dprinc->img );
        $dprinc->delete();

        session()->flash('message', 'Principle Page SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deleteAllPrinciple() {

        $dPrinciple = Principle::all();
        $dPrinciple = Principle::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Principle File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

// Teams-area-------------------->>>>

    public function addTeam()
    {
    	$data['title'] = 'Add Team';
    	$data['aroute'] = "post-team";
        return view('backend.add-team', $data);
    }

    public function postTeam(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        
        ]);

        $uid = Auth::user()->id;
        if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Team::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('img/team/'), $img);


            $team['img'] = $img;
        }

        $team['name'] = $request->name;
        $team['degree'] = $request->degree;
        $team['position'] = $request->position;
		$team['admin_id'] = $uid;

        Team::create($team);
        session()->flash('message', 'Team succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allTeam() {
        $data['title'] = "All Teams";
        $data['editroute'] = "edit-team";
        $data['droute'] = "delete-team";
        $data['dallroute'] = "delete-all-team";
        $data['teams'] = Team::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-teams', $data);
    }

    public function editTeam($id) {
        $data['title'] = 'Edit Team';
        $data['route'] = 'update-team';
        $data['team'] = Team::whereId($id)->first();

        return view('backend.edit-team', $data);
    }

    public function updateTeam($id, Request $request) {

        $this->Validate($request, [
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'position' => 'required|string|max:255',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        
        ]);

        $uteam = Team::findOrFail($id);
        $uid = Auth::user()->id;

        if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Team::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('img/team/'), $img);


            $uteam['img'] = $img;
        }

        $uteam['name'] = $request->name;
        $uteam['degree'] = $request->degree;
        $uteam['position'] = $request->position;
		$uteam['admin_id'] = $uid;

        $uteam->save();

        session()->flash('message', 'Team succefully Updated!');
        Session::flash('type', 'success'); 
        return redirect()->back();
    }

    public function deleteTeam($id) {

        $dteam = Team::findOrFail($id);

        unlink(public_path() .  '/img/team/' . $dteam->img );
    
        $dteam->delete();

        session()->flash('message', 'Team SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();

    }

    public function deleteAllTeam() {

        $dTeam = Team::all();
        $dTeam = Team::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Team File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

// Clients-area-------------------->>>>
    public function addClient()
    {
    	$data['title'] = 'Add Client';
    	$data['aroute'] = "post-client";
    	$data['hasCats'] = 1;
        $data['drpDwn'] = 0;
      
        return view('backend.add-page', $data);
    }

    public function postClient(Request $request)
    {
       $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        
        ]);

       $uid = Auth::user()->id;

        if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Client::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('img/client/'), $img);
            $client['img'] = $img;
        }

        $client['title'] = $request->title;
        $client['details'] = $request->details;
		$client['admin_id'] = $uid;

        Client::create($client);

        session()->flash('message', 'Client succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allClient() {
        $data['title'] = "All clients";
        $data['editroute'] = "edit-client";
        $data['droute'] = "delete-client";
        $data['dallroute'] = "delete-all-client";
        $data['hasCats'] = 1;
        $data['news'] = Client::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-pages', $data);
    }

    public function editClient($id) {
        $data['title'] = 'Edit Client';
        $data['route'] = 'update-client';
        $data['hasCats'] = 1;
        $data['news'] = Client::whereId($id)->first();

        return view('backend.edit-page', $data);
    }

    public function updateClient($id, Request $request) {

        $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
        
        ]);

        $uclient = Client::findOrFail($id);
        $uid = Auth::user()->id;

       
        if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Client::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('img/client/'), $img);
            $uclient['img'] = $img;
        }

        $uclient['title'] = $request->title;
        $uclient['details'] = $request->details;
		$uclient['admin_id'] = $uid;

        $uclient->save();

        session()->flash('message', 'Client succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deleteClient($id) {

        $dclient = Client::findOrFail($id);
        unlink(public_path() .  '/img/client/' . $dclient->img );
        $dclient->delete();

        session()->flash('message', 'Client SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function deleteAllClient() {

        $dClient = Client::all();
        $dClient = Client::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Client File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }


// Careers-area-------------------->>>>

   public function addCareer()
    {
        $data['title'] = 'Add Career';
        $data['aroute'] = "post-career";
        $data['hasCats'] = 0;
          $data['drpDwn'] = 0;
      
        return view('backend.add-page', $data);
    }

    public function postCareer(Request $request)
    {
       $this->Validate($request, [
            'title' => 'required|string|max:255',
            'details' => 'required|string|min:5',
        
        ]);

       $uid = Auth::user()->id;

         $title = preg_replace('!\s+!', ' ', $request->title);

        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        $slug = $title;

        $count = 0;
        $tcount = 1;

        while ($count < 1) {
            $hasSlug = Career::whereSlug($slug)->first();

            if ($hasSlug) {
             $newtitle =$title.'-'.$tcount; 
             $slug = $newtitle; 
             $tcount++;
            }else{
                $count++;
            }
        }

        $page['slug'] = $slug;
        $page['title'] = $request->title;
        $page['details'] = $request->details;
        $page['admin_id'] = $uid;


        Career::create($page);
        session()->flash('message', 'Career succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allCareers() {
    $data['title'] = "All Careers";
    $data['editroute'] = "edit-career";
    $data['droute'] = "delete-career";
    $data['dallroute'] = "delete-all-career";
    $data['hasCats'] = 0;
    $data['news'] = Career::orderBy('id', 'desc')->paginate(10);

    return view('backend.all-pages', $data);
    }



    public function editCareer($id) {
        $data['title'] = 'Edit Career';
        $data['route'] = 'update-career';
        $data['hasCats'] = 0;

        $data['news'] = Career::whereId($id)->first();

        return view('backend.edit-page', $data);
    }

    public function updateCareer($id, Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'details' => 'required|string|min:5',

        ]);
        $news = Career::findOrFail($id);

        $uid = Auth::user()->id;

        $news['title'] = $request->title;
        $news['details'] = $request->details;

        $news->save();

        session()->flash('message', 'Career succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }

    public function deleteCareer($id) {

        $page = Career::findOrFail($id);
        $page->delete();

        session()->flash('message', 'Career SuccessFully Delete!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    public function deleteAllCareer() {

        $dCareer = Career::all();
        $dCareer = Career::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Career File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

// Appliers-area-------------------->>>>

    public function allAppliers() {
        $data['title'] = "All appliers";
        $data['vroute'] = "view-applier";
        $data['droute'] = "delete-applier";
        $data['dallroute'] = "delete-all-applier";
        $data['news'] = Apply::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-appliers', $data);
    }

    public function viewApplier($id) {
        $data['title'] = 'View appliers';
        $data['apply'] = Apply::whereId($id)->first();

        return view('backend.view-applier', $data);
    }

    public function deleteApplier($id) {

        $applier = Apply::findOrFail($id);
        unlink(public_path() .  '/uploaded_cv/' . $applier->up_cv );
        unlink(public_path() .  '/uploaded_cv/' . $applier->up_protfolio );
        $applier->delete();

        session()->flash('message', 'Applier Details SuccessFully Delete!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    public function deleteAllApplier() {

        $dApplier = Apply::all();
        $dApplier = Apply::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Applier File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }


// Works-area-------------------->>>>

    public function addWork()
    {
        $data['title'] = 'Add Work';
        $data['aroute'] = "post-work";
        $data['hasCats'] = 1;
        $data['drpDwn'] = 0;
      
        return view('backend.add-work', $data);
    }

    public function postWork(Request $request)
    {
       $this->Validate($request, [
            'title' => 'required|string|max:255',
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:8048',
            'position' => 'numeric',
        
        ]);

       $uid = Auth::user()->id;

          $works = Work::orderBy('id', 'desc')->count();

        if ($works >= 11) {
        session()->flash('message', 'Change an existing Work Name or Delete and add a new one as, Adding more than 11 Work can Effect website menu bar!');
        Session::flash('type', 'warning');
        return redirect()->back();
        }

        

       
        if ($request->img) {

        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname . '.' . $request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = Work::whereImg($img)->first();
            if ($hasImg) {
                $newimgname = $imgname . '_' . $imgcount;
                $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                $imgcount++;
            } else {
                $count++;
            }
        }

        $request->img->move(public_path('work/feature/'), $img);


        $princ['img'] = $img;
    }

         $title = preg_replace('!\s+!', ' ', $request->title);

        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        $slug = $title;

        $count = 0;
        $tcount = 1;

        while ($count < 1) {
            $hasSlug = Work::whereSlug($slug)->first();

            if ($hasSlug) {
             $newtitle =$title.'-'.$tcount; 
             $slug = $newtitle; 
             $tcount++;
            }else{
                $count++;
            }
        }

        $princ['slug'] = $slug;
        $princ['title'] = $request->title;
        $princ['position'] = $works+1;
        $princ['admin_id'] = $uid;


        Work::create($princ);

        session()->flash('message', 'Work succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allWorks() {
        $data['title'] = "All Works";
        $data['editroute'] = "edit-work";
        $data['droute'] = "delete-work";
        $data['dallroute'] = "delete-all-work";
        $data['hasCats'] = 0;
        $data['news'] = Work::orderBy('id', 'desc')->paginate(10);

        return view('backend.all-works', $data);
    }

    public function editWork($id) {
        $data['title'] = 'Edit Work';
        $data['route'] = 'update-work';
        $data['hasCats'] = 1;
        $data['news'] = Work::whereId($id)->first();

        return view('backend.edit-work', $data);
    }

    public function updateWork($id, Request $request) {

         $this->Validate($request, [
            'title' => 'required|string|max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:8048',
            'position' => 'numeric',
        
        ]);

        $uprinc = Work::findOrFail($id);

            if ($request->img) {

        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname . '.' . $request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = Work::whereImg($img)->first();
            if ($hasImg) {
                $newimgname = $imgname . '_' . $imgcount;
                $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                $imgcount++;
            } else {
                $count++;
            }
        }

        $request->img->move(public_path('img/feature/'), $img);


        $uprinc['img'] = $img;
    }

        $uprinc['title'] = $request->title;
        $uprinc['position'] = $request->position;
       
        $uprinc->save();

        session()->flash('message', 'Work succefully Updated!');
        Session::flash('type', 'success');

        return redirect()->route('all-works');
    }

    public function deleteWork($id) {

        $dprinc = Work::findOrFail($id);
        $wfid = WorkFile::whereWorkId($id);
        // $wfimg = WorkfileImg::whereWorkfileId($id);

        foreach($wfimg as $wid) {
            $appslot = WorkfileImg::whereWorkfileId($wid)->delete();
        }
        $wfid->delete();
        $dprinc->delete();


        session()->flash('message', 'Work SuccessFully Delete!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    public function deleteAllWork() {

        $dWork = Work::all();
        $dWork = Work::whereNotNull('id')->delete();
        $dWork = WorkFile::whereNotNull('id')->delete();
        $dWork = WorkfileImg::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All Work File!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

// WorkFiles-area-------------------->>>>

    public function addWorkFile()
    {
        $data['title'] = 'Add WorkFile';
        $data['aroute'] = "post-workfile";
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
        $data['works'] = Work::orderBy('id', 'asc')->get();
        return view('backend.add-work', $data);
    }

    public function postWorkFile(Request $request)
    {
         $messages = [
            'work_id.numeric' => 'You forgot to select an work!',
             'img.max' => 'Failed to upload an feature image. The image maximum size is 5MB!',
             'file.max' => 'Failed to upload an image. The image maximum size is 5MB.',
        ];
       $this->Validate($request, [
            'title' => 'required',
            'img' => 'max:8048',
            'work_id' => 'required|numeric',
           ],$messages);

       $uid = Auth::user()->id;

          if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Workfile::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('workfile/feature/'), $img);

            $princ['img'] = $img;
        }

     

      $title = preg_replace('!\s+!', ' ', $request->title);

        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        $slug = $title;

        $count = 0;
        $tcount = 1;

        while ($count < 1) {
            $hasSlug = Workfile::whereSlug($slug)->first();

            if ($hasSlug) {
             $newtitle =$title.'-'.$tcount; 
             $slug = $newtitle; 
             $tcount++;
            }else{
                $count++;
            }
        }

        $princ['slug'] = $slug;
        $princ['title'] = $request->title;
        $princ['work_id'] = $request->work_id;
        $princ['admin_id'] = $uid;

        WorkFile::create($princ);

        session()->flash('message', 'Workfile succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function allWorkFiles() {
        $data['title'] = "All WorkFiles";
        $data['editroute'] = "edit-workfile";
        $data['droute'] = "delete-workfile";
        $data['dallroute'] = "delete-all-workfile";
        $data['hasCats'] = 0;
        $data['news'] = WorkFile::orderBy('id', 'desc')->paginate(10);
        // $data['cats'] = WorkFileMeta::whereWorkId($id)->first();
        
        return view('backend.all-workfiles', $data);
    }

    public function editWorkFile($id) {
        $data['title'] = 'Edit WorkFile';
        $data['route'] = 'update-workfile';
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
        $data['fileType'] = 0;
        $data['fileimg'] = 0;
        $data['works'] = Work::orderBy('id', 'asc')->get();
        $data['workfiletypes'] = WorkfileType::orderBy('id', 'asc')->get();
        $data['post'] = WorkFile::whereId($id)->first();
        // $data['post'] = Workfile::whereWorkId($id)->first();
        return view('backend.edit-workFile', $data);
    }

    public function updateWorkFile($id, Request $request) {

        $messages = [
         
            // 'work_id.numeric' => 'You forgot to select an work!',
        ];
       $this->Validate($request, [
            'title' => 'required',
            'work_id' => 'required',
        
           ],$messages);

        $uid = Auth::user()->id;
        // $wfm = WorkFile::findOrFail($id);
        $wf = WorkFile::findOrFail($id);

            if ($request->img) {

            $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);
            $imgname = strtolower($imgname);

            $img = $imgname . '.' . $request->img->getClientOriginalExtension();

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Workfile::whereImg($img)->first();
                if ($hasImg) {
                    $newimgname = $imgname . '_' . $imgcount;
                    $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->img->move(public_path('workfile/feature/'), $img);

            $wf['img'] = $img;
        }

        // $wfm['work_id'] = $request->work_id;
        $wf['title'] = $request->title;
        $wf['admin_id'] = $uid;
        $wf['work_id'] = $request->work_id;

        $wf->save();

        session()->flash('message', 'WorkFile succefully Updated!');
        Session::flash('type', 'success');
       
        return redirect()->back();

    }

    public function deleteWorkFile($id) {

        $dwf = WorkFile::findOrFail($id);
        unlink(public_path() .  '/workfile/feature/' . $dwf->img );
        $dwfi = WorkfileImg::whereWorkfileId($id)->delete();
        unlink(public_path() .  '/workfile/img/' . $dwfi->file );
        $dprinc->delete();

        session()->flash('message', 'WorkFile SuccessFully Deleted!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    public function deleteAllWorkFile() {

        $dWorkFile = WorkFile::all();
        $dWorkFile = WorkFile::whereNotNull('id')->delete();
        $dWorkFile = WorkfileImg::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All WorkFile!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    // WorkFilesImg-area-------------------->>>>

    public function addWorkFileImg()
    {
        $data['title'] = 'Add WorkFile Image';
        $data['aroute'] = "post-workfileimg";
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
        $data['fileType'] = 0;
        $data['fileimg'] = 1;
        $data['workfiles'] = WorkFile::orderBy('id', 'asc')->get();
        $data['workfiletypes'] = WorkfileType::orderBy('id', 'asc')->get();
        return view('backend.add-workfile', $data);
    }

    public function postWorkFileImg(Request $request)
    {
         $messages = [
            'workfile_id.numeric' => 'You forgot to select an workfile id!',
            'file.max' => 'Failed to upload an image/video. The image/video maximum size is 5MB.',
             'details.max' => 'You can input 500 words!',
        ];
        $this->Validate($request, [
            'details' => 'max:500',
            'workfile_id' => 'required|numeric',
            'file_type' => 'required|numeric',
            'file' => 'max:8048',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        
           ],$messages);


             // $types = WorkFileType::orderBy('id', 'desc')->count();
         $details = $request->details;
         $file= $request->file;

          if ($details || $file) {
     

        if ($request->file_type == 1) {

                $ntm['details'] = $request->details;

        }elseif($request->file_type == 2){
           
    //         if ($request->file) {

    //             $files = $request->file('file');
    //              foreach ($files as $f) {

    //         $filename = pathinfo($f->getClientOriginalName(), PATHINFO_FILENAME);

    //         $filename = preg_replace('!\s+!', ' ', $filename);
    //         $filename = str_replace(' ', '-', $filename);
    //         $filename = strtolower($filename);

    //         $file = $filename . '.' . $f->getClientOriginalExtension();

    //         $count = 0;
    //         $filecount = 1;

    //         while ($count < 1) {
    //             $hasFile = WorkfileImg::whereFile($file)->first();
    //             if ($hasFile) {
    //                 $newfilename = $filename . '_' . $filecount;
    //                 $file = $newfilename . '.' . $f->getClientOriginalExtension();
    //                 $filecount++;
    //             } else {
    //                 $count++;
    //             }
    //         }
    //         $f->move(public_path('workfile/img/'), $file);
    //         $ntm['file'] = $file;
    //     }
        
    // }

        if ($request->file) {
        $files = $request->file('file');
        foreach ($files as $file) {

            // $newimg['con_id'] = $lcon;

            $imgname = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $imgname = preg_replace('!\s+!', ' ', $imgname);
            $imgname = str_replace(' ', '-', $imgname);

            $img = $imgname . '.' . $file->getClientOriginalExtension();
            // $img = 'Con_'.$lcon. '_' . $img;

            $file->move(public_path('workfile/img/'), $img);

            $ntm['file'] = $img;

            // ConImg::create($newimg);
           
        }
    }

    }else{

            if ($request->file) {

            $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

            $filename = preg_replace('!\s+!', ' ', $filename);
            $filename = str_replace(' ', '-', $filename);
            $filename = strtolower($filename);

            $file = $filename . '.' . $request->file->getClientOriginalExtension();

            $count = 0;
            $filecount = 1;

            while ($count < 1) {
                $hasFile = WorkfileImg::whereFile($file)->first();
                if ($hasFile) {
                    $newfilename = $filename . '_' . $filecount;
                    $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                    $filecount++;
                } else {
                    $count++;
                }
            }

            $request->file->move(public_path('workfile/video/'), $file);

            $ntm['file'] = $file;
        }
     }
        $ntm['workfile_id'] = $request->workfile_id;
        $ntm['file_type'] = $request->file_type;

        WorkFileImg::create($ntm);

        session()->flash('message', 'Workfile Image succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();


    }else{

           session()->flash('message', 'You must be fill the text/image/video area!');
        Session::flash('type', 'error');
        return redirect()->back();
        }
    }


    public function allWorkFileImgs() {
        $data['title'] = "All WorkFile Images";
        $data['editroute'] = "edit-workfileimg";
        $data['droute'] = "delete-workfileimg";
        $data['dallroute'] = "delete-all-workfileimg";
        $data['hasCats'] = 0;
        $data['workfileimgs'] = WorkfileImg::orderBy('id', 'desc')->paginate(10);
        return view('backend.all-workfileimgs', $data);
    }

    public function editWorkFileImg($id) {
        $data['title'] = 'Edit WorkFile Images';
        $data['route'] = 'update-workfileimg';
        $data['hasCats'] = 0;
        $data['drpDwn'] = 0;
        $data['fileType'] = 0;
        $data['fileimg'] = 1;
        $data['works'] = Work::orderBy('id', 'asc')->get();
        $data['workfiles'] = WorkFile::orderBy('id', 'asc')->get();
        $data['workfiletypes'] = WorkfileType::orderBy('id', 'asc')->get();
        $data['post'] = WorkfileImg::whereId($id)->first();
        return view('backend.edit-workFile', $data);
    }

    public function updateWorkFileImg($id, Request $request) {

             $messages = [
            'workfile_id.numeric' => 'You forgot to select an workfile id!',
            'file.max' => 'Failed to upload an image. The image maximum size is 5MB.',
        ];
        $this->Validate($request, [
            'details' => 'max:2000',
            'workfile_id' => 'required|numeric',
            'file_type' => 'required|numeric',
            'file' => 'max:8048',
        
           ],$messages);

             $ntm = WorkfileImg::find($id);

        if ($request->file_type == 1) {

                $ntm['details'] = $request->details;

        }elseif($request->file_type == 2){
           
            if ($request->file) {

            $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

            $filename = preg_replace('!\s+!', ' ', $filename);
            $filename = str_replace(' ', '-', $filename);
            $filename = strtolower($filename);

            $file = $filename . '.' . $request->file->getClientOriginalExtension();

            $count = 0;
            $filecount = 1;

            while ($count < 1) {
                $hasFile = WorkfileImg::whereFile($file)->first();
                if ($hasFile) {
                    $newfilename = $filename . '_' . $filecount;
                    $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                    $filecount++;
                } else {
                    $count++;
                }
            }
            $request->file->move(public_path('workfile/img/'), $file);
            $ntm['file'] = $file;
        }

    }else{

            if ($request->file) {

            $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

            $filename = preg_replace('!\s+!', ' ', $filename);
            $filename = str_replace(' ', '-', $filename);
            $filename = strtolower($filename);

            $file = $filename . '.' . $request->file->getClientOriginalExtension();

            $count = 0;
            $filecount = 1;

            while ($count < 1) {
                $hasFile = WorkfileImg::whereFile($file)->first();
                if ($hasFile) {
                    $newfilename = $filename . '_' . $filecount;
                    $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                    $filecount++;
                } else {
                    $count++;
                }
            }

            $request->file->move(public_path('workfile/video/'), $file);

            $ntm['file'] = $file;
        }
     }
        $ntm['workfile_id'] = $request->workfile_id;
        $ntm['file_type'] = $request->file_type;

        $ntm->save();

        session()->flash('message', 'Workfile image succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deleteWorkFileImg($id) {

        $dwfi = WorkfileImg::findOrFail($id);
        unlink(public_path() .  '/workfile/img/' . $dwfi->file );
        $dwfi->delete();

        session()->flash('message', 'Workfile image SuccessFully Deleted!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

     public function deleteAllWorkFileImg() {

        $dWorkFileImg = WorkfileImg::all();
        $dWorkFileImg = WorkfileImg::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All WorkFileImg!');
        Session::flash('type', 'success');

        return redirect()->back();

    }


// WorkFilesType-area-------------------->>>>

    public function addWorkFileType()
    {
        $data['title'] = 'Add WorkFile Type';
        $data['aroute'] = "post-workfiletype";
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
        $data['fileType'] = 1;
        $data['fileimg'] = 0;
        $data['workfiles'] = WorkFile::orderBy('id', 'asc')->get();
        $data['workfiletypes'] = WorkfileType::orderBy('id', 'asc')->get();
        return view('backend.add-workfile', $data);
    }

    public function postWorkFileType(Request $request)
    {
         $messages = [
            'type.max' => 'You can input 255 words!',
        ];
        $this->Validate($request, [
            'type' => 'required|max:255',
        
           ],$messages);

        $types = WorkFileType::orderBy('id', 'desc')->count();

          if ($types >= 4) {
        session()->flash('message', 'You can add only three(4) types of workfile file type, if you want then you can update only!');
        Session::flash('type', 'warning');
        return redirect()->back();
        }
        
        $ntm['type'] = $request->type;

        WorkFileType::create($ntm);

        session()->flash('message', 'Workfile type succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allWorkFileTypes() {
        $data['title'] = "All WorkFile Types";
        $data['editroute'] = "edit-workfiletype";
        $data['droute'] = "delete-workfiletype";
        $data['dallroute'] = "delete-all-workfiletype";
        $data['hasCats'] = 0;
        $data['workfiletypes'] = WorkfileType::orderBy('id', 'desc')->paginate(10);
        return view('backend.all-types', $data);
    }

    public function editWorkFileType($id) {
        $data['title'] = 'Edit WorkFile Types';
        $data['route'] = 'update-workfiletype';
        $data['hasCats'] = 0;
        $data['drpDwn'] = 0;
        $data['fileType'] = 1;
        $data['fileimg'] = 0;
        $data['works'] = Work::orderBy('id', 'asc')->get();
        $data['post'] = WorkfileType::whereId($id)->first();
        return view('backend.edit-workFile', $data);
    }

    public function updateWorkFileType($id, Request $request) {

        $messages = [
            'type.max' => 'You can input 255 words!',
        ];
        $this->Validate($request, [
            'type' => 'required|max:255',
        
           ],$messages);

        $ntm = WorkfileType::find($id);
        
        $ntm['type'] = $request->type;

        $ntm->save();

        session()->flash('message', 'Workfile type succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deleteWorkFileType($id) {

        $dprinc = WorkfileType::findOrFail($id);
        // $diid = WorkfileImg::whereFileType($id)->delete();
        $dprinc->delete();

        session()->flash('message', 'Workfile Type SuccessFully Deleted!');
        Session::flash('type', 'success');

        return redirect()->back();

    }

    public function deleteAllWorkFileType() {

        $dWorkFileType = WorkfileType::all();
        $dWorkFileType = WorkfileType::whereNotNull('id')->delete();

        session()->flash('message', 'SuccessFully Deleted All WorkFileType!');
        Session::flash('type', 'success');

        return redirect()->back();

    }



// Sliders-area-------------------->>>>


    public function getSlider()
    {
        $data['title'] = "Sliders";
        $data['route'] = "add-slider";
        $data['eroute'] = "update-slider";
        $data['droute'] = "delete-slider";
        $data['sliders'] = Slider::orderBy('position', 'asc')->get();
        return view('backend.slider', $data);
    }

    public function addSlider(Request $request)
    {
        $this->validate($request,[
            'position' => 'numeric',
            'img' => 'required|max:8048',
        ]);
        $slides = Slider::orderBy('id', 'desc')->count();

        if ($slides >= 6) {
        session()->flash('message', 'Change an existing slide or Delete and add a new one as, Adding more than 6 slides can Effect site loading time!');
        Session::flash('type', 'warning');
        return redirect()->back();
        }



        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname.'.'.$request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = Slider::whereImg($img)->first();
            if ($hasImg) {
             $newimgname =$imgname.'_'.$imgcount; // forwarding-letter_4  $imgname= forwarding-letter
             $img = $newimgname.'.'.$request->img->getClientOriginalExtension(); // forwarding-letter_4.jpg
             $imgcount++; // $imgcount = 5;
            }else{
                $count++;
            }
            //count == 0
        }
        
        $request->img->move(public_path('img/slider'), $img);

        $slider['img'] = $img;
        $slider['position'] = $slides+1;

        Slider::create($slider);
        session()->flash('message', 'Slider Image Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function updateSlider($id,Request $request)
    {
        $this->validate($request,[
            'position' => 'required|numeric',
            'img' => 'max:8048',
        ]);

        $slide = Slider::findOrFail($id);

        if ($request->img) {
            # code...
        
        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname.'.'.$request->img->getClientOriginalExtension();
        // $img = $imgname.'.'.$request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = Slider::whereImg($img)->first();
            // $hasImg = Slider::where('img','=', $img)->first();

            if ($hasImg) {
             $newimgname =$imgname.'_'.$imgcount; // forwarding-letter_4  $imgname= forwarding-letter
             $img = $newimgname.'.'.$request->img->getClientOriginalExtension(); // forwarding-letter_4.jpg
             $imgcount++; // $imgcount = 5;
            }else{
                $count++;
            }
            //count == 0
        }
        $request->img->move(public_path('img/slider'), $img);
        $slide['img'] = $img;
        }
        $slide['position'] = $request->position;

        $slide->save();

        session()->flash('message', 'Slider Successfully updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function deleteSlider($id)
    {
        $slide = Slider::findOrFail($id);
        unlink(public_path() .  '/img/slider' . $slide->img );
        $slide->delete();

        session()->flash('message', 'Slider Successfully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

// Address-area-------------------->>>>

    public function getAddress()
    {
        $data['title'] = 'Add Google Map';
        $data['aroute'] = "post-address";
        // $data['eroute'] = "update-address";
        $data['page'] = AddressMap::find(1);
        return view('backend.address-map', $data);
    }

    public function postAddress(Request $request)
    {

        $messages = [
            'lat.required' => 'Something went wrong with your address selection, please try again!',
            'long.required' => 'Something went wrong with your address selection, please try again!',
        ];
       $this->Validate($request, [
            'address' => 'required|string|max:255',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
           
        
        ]);

        $page = AddressMap::orderBy('id', 'desc')->count();

        if ($page >= 1) {
        session()->flash('message', 'You can add only one(1) address in google map, if you want then you can update only!');
        Session::flash('type', 'warning');
        return redirect()->back();
        }

        $page['address'] = $page+1;
        $page['lat'] = $request->lat;
        $page['long'] = $request->long;
     

        AddressMap::create($page);
        session()->flash('message', 'Google map address succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


    public function editAddress($id)
    {
        $data['title'] = 'Update Website Settings';
        $data['eroute'] = "update-address";
        $data['page'] = AddressMap::find(1);
        // $data['page'] = AddressMap::whereId($id)->first();
        return view('backend.edit-address-map', $data);
    }

    public function updateAddress($id,Request $request)
    {

       $this->Validate($request, [
            'address' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
            'img' => 'max:1024',
        
        ]);

           $page = AddressMap::findOrFail($id);

                   if ($request->img) {
            # code...
        
        $imgname = pathinfo($request->img->getClientOriginalName(), PATHINFO_FILENAME);

        $imgname = preg_replace('!\s+!', ' ', $imgname);
        $imgname = str_replace(' ', '-', $imgname);
        $imgname = strtolower($imgname);

        $img = $imgname.'.'.$request->img->getClientOriginalExtension();
        // $img = $imgname.'.'.$request->img->getClientOriginalExtension();

        $count = 0;
        $imgcount = 1;

        while ($count < 1) {
            $hasImg = AddressMap::whereImg($img)->first();
            // $hasImg = Slider::where('img','=', $img)->first();

            if ($hasImg) {
             $newimgname =$imgname.'_'.$imgcount; // forwarding-letter_4  $imgname= forwarding-letter
             $img = $newimgname.'.'.$request->img->getClientOriginalExtension(); // forwarding-letter_4.jpg
             $imgcount++; // $imgcount = 5;
            }else{
                $count++;
            }
            //count == 0
        }
        $request->img->move(public_path('img/logo'), $img);
        $page['img'] = $img;
        }
        
        $page['address'] = $request->address;
        $page['lat'] = $request->lat;
        $page['long'] = $request->long;
        $page['phone'] = $request->phone;
        $page['email'] = $request->email;

        $page->save();

        session()->flash('message', 'Website settings succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


}
