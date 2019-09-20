<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
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


class BackendController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }


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
    public function addPage()
    {
    	$data['title'] = 'Add Pages';
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
    $data['title'] = "All Page";
    $data['editroute'] = "edit-page";
    $data['droute'] = "delete-page";
    $data['hasCats'] = 0;
    $data['news'] = Page::orderBy('id', 'desc')->get();

    return view('backend.all-pages', $data);
    }



public function editPage($id) {
        // $data['post'] = Page::findOrFail($id);
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
        // $news['slug'] = $slug;
        $news['details'] = $request->details;

       
        $news->save();

        //$user->balance = $user->balance +100;

        // $data['user'] = User::Where('id','=','1')->first();
        //$data['users'] = User::all();
        session()->flash('message', 'Page succefully Updated!');
        Session::flash('type', 'success');
        
        return redirect()->back();

    }

    public function deletePage($id) {

        $page = Page::findOrFail($id);
        $page->delete();

        session()->flash('message', 'Page SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }






















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
       $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
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
            $hasImg = PageImg::whereImg($img)->first();
            if ($hasImg) {
                $newimgname = $imgname . '_' . $imgcount;
                $img = $newimgname . '.' . $request->img->getClientOriginalExtension();
                $imgcount++;
            } else {
                $count++;
            }
        }

        $request->img->move(public_path('img/page/'), $img);


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
        // $princ['img'] = $img;
        $princ['title'] = $request->title;
        $princ['details'] = $request->details;
		$princ['admin_id'] = $uid;


        PageImg::create($princ);
        session()->flash('message', 'Page succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allPrinciple() {
    $data['title'] = "All Page";
    $data['editroute'] = "edit-principle";
    $data['droute'] = "delete-principle";
    $data['hasCats'] = 0;
    $data['news'] = PageImg::orderBy('id', 'desc')->get();

    return view('backend.all-pages', $data);
    }



public function editPrinciple($id) {
        // $data['post'] = PageImg::findOrFail($id);
        $data['title'] = 'Edit Page';
        $data['route'] = 'update-principle';
        $data['hasCats'] = 1;

        $data['news'] = PageImg::whereId($id)->first();
        return view('backend.edit-page', $data);
    }

    public function updatePrinciple($id, Request $request) {

         $this->Validate($request, [
            'title' => 'required|string|max:255',
			'details' => 'required|string|min:5',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);

       // $uid = Auth::user()->id;
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

        $request->img->move(public_path('img/page/'), $img);


        $uprinc['img'] = $img;
    }


      
        // $uprinc['img'] = $img;
        $uprinc['title'] = $request->title;
        $uprinc['details'] = $request->details;
		// $uprinc['admin_id'] = $uid;


       
        $uprinc->save();

        session()->flash('message', 'Page succefully Updated!');
        Session::flash('type', 'success');
       
        return redirect()->back();

    }

    public function deletePrinciple($id) {

        $dprinc = PageImg::findOrFail($id);
        $dprinc->delete();

        session()->flash('message', 'Page SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }




 public function addTeam()
    {
    	$data['title'] = 'Add Team';
    	$data['aroute'] = "post-team";
    	// $data['hasCats'] = 1;
      
        return view('backend.add-team', $data);
    }

    public function postTeam(Request $request)
    {
       $this->Validate($request, [
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'position' => 'required|string|max:255',
			// 'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
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

     

        // $team['slug'] = $slug;
        // $team['img'] = $img;
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
    $data['title'] = "All Team";
    $data['editroute'] = "edit-team";
    $data['droute'] = "delete-team";
    $data['teams'] = Team::orderBy('id', 'desc')->get();

    return view('backend.all-teams', $data);
    }



public function editTeam($id) {
        // $data['post'] = Team::findOrFail($id);
        $data['title'] = 'Edit Team';
        $data['route'] = 'update-team';
        // $data['hasCats'] = 1;

        $data['team'] = Team::whereId($id)->first();
        return view('backend.edit-team', $data);
    }

    public function updateTeam($id, Request $request) {

               $this->Validate($request, [
            'name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'position' => 'required|string|max:255',
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
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



        // $uteam['img'] = $img;
        $uteam['name'] = $request->name;
        $uteam['degree'] = $request->degree;
        $uteam['position'] = $request->position;
		$uteam['admin_id'] = $uid;


       
        $uteam->save();

        //$user->balance = $user->balance +100;

        // $data['user'] = User::Where('id','=','1')->first();
        //$data['users'] = User::all();
        session()->flash('message', 'Team succefully Updated!');
        Session::flash('type', 'success');
        
        return redirect()->back();

    }

    public function deleteTeam($id) {

        $dteam = Team::findOrFail($id);
        $dteam->delete();

        session()->flash('message', 'Team SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }





















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
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
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

        // $client['img'] = $img;
        $client['title'] = $request->title;
        $client['details'] = $request->details;
		$client['admin_id'] = $uid;


        Client::create($client);
        session()->flash('message', 'Client succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allClient() {
    $data['title'] = "All Page";
    $data['editroute'] = "edit-client";
    $data['droute'] = "delete-client";
    $data['hasCats'] = 1;
    $data['news'] = Client::orderBy('id', 'desc')->get();

    return view('backend.all-pages', $data);
    }



public function editClient($id) {
        // $data['post'] = Client::findOrFail($id);
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
			'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
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

       
        // $uclient['img'] = $img;
        $uclient['title'] = $request->title;
        $uclient['details'] = $request->details;
		$uclient['admin_id'] = $uid;


       
        $uclient->save();

        //$user->balance = $user->balance +100;

        // $data['user'] = User::Where('id','=','1')->first();
        //$data['users'] = User::all();
        session()->flash('message', 'Client succefully Updated!');
        Session::flash('type', 'success');
        
        return redirect()->back();

    }

    public function deleteClient($id) {

        $dclient = Client::findOrFail($id);
        $dclient->delete();

        session()->flash('message', 'Client SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }



   public function addCareer()
    {
        $data['title'] = 'Add Careers';
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
    $data['title'] = "All Career";
    $data['editroute'] = "edit-career";
    $data['droute'] = "delete-career";
    $data['hasCats'] = 0;
    $data['news'] = Career::orderBy('id', 'desc')->get();

    return view('backend.all-pages', $data);
    }



public function editCareer($id) {
        // $data['post'] = Career::findOrFail($id);
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
        // $news['slug'] = $slug;
        $news['details'] = $request->details;

       
        $news->save();

        //$user->balance = $user->balance +100;

        // $data['user'] = User::Where('id','=','1')->first();
        //$data['users'] = User::all();
        session()->flash('message', 'Career succefully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }

    public function deleteCareer($id) {

        $page = Career::findOrFail($id);
        $page->delete();

        session()->flash('message', 'Career SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }


  public function allAppliers() {
    $data['title'] = "All Page";
    $data['droute'] = "delete-applier";
    $data['news'] = Apply::orderBy('id', 'desc')->get();

    return view('backend.all-appliers', $data);
    }


 public function deleteApplier($id) {

        $page = Apply::findOrFail($id);
        $page->delete();

        session()->flash('message', 'Applier Details SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }









public function addWork()
    {
        $data['title'] = 'Add Work';
        $data['aroute'] = "post-work";
        $data['hasCats'] = 0;
        $data['drpDwn'] = 0;
      
        return view('backend.add-work', $data);
    }

    public function postWork(Request $request)
    {
       $this->Validate($request, [
            'title' => 'required|string|max:255',
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
        // $princ['img'] = $img;
        $princ['title'] = $request->title;
        $princ['admin_id'] = $uid;


        Work::create($princ);

        session()->flash('message', 'Work succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function allWorks() {
    $data['title'] = "All Work";
    $data['editroute'] = "edit-work";
    $data['droute'] = "delete-work";
    $data['hasCats'] = 0;
    $data['news'] = Work::orderBy('id', 'desc')->get();

    return view('backend.all-works', $data);
    }



public function editWork($id) {
        // $data['post'] = Work::findOrFail($id);
        $data['title'] = 'Edit Work';
        $data['route'] = 'update-work';
        $data['hasCats'] = 1;

        $data['news'] = Work::whereId($id)->first();
        return view('backend.edit-work', $data);
    }

    public function updateWork($id, Request $request) {

         $this->Validate($request, [
            'title' => 'required|string|max:255',
            // 'details' => 'required|string|min:5',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
        ]);

        $uprinc = Work::findOrFail($id);
       // $uid = Auth::user()->id;

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

      
        // $uprinc['img'] = $img;
        $uprinc['title'] = $request->title;
        // $uprinc['details'] = $request->details;
        // $uprinc['admin_id'] = $uid;


       
        $uprinc->save();

        session()->flash('message', 'Work succefully Updated!');
        Session::flash('type', 'success');
       
        return redirect()->back();

    }

    public function deleteWork($id) {

        $dprinc = Work::findOrFail($id);
        $dprinc->delete();

        session()->flash('message', 'Work SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }


public function addWorkFile()
    {
        $data['title'] = 'Add WorkFile';
        $data['aroute'] = "post-workfile";
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
          $data['works'] = Work::orderBy('id', 'desc')->get();
        return view('backend.add-workfile', $data);
    }

    public function postWorkFile(Request $request)
    {


         $messages = [
         
            'file_type.numeric' => 'You forgot to select a choose file type!',
            'work_id.numeric' => 'You forgot to select an work!',
        ];
       $this->Validate($request, [
            'title' => 'required',
            'work_id' => 'required|numeric',
            'file_type' => 'required|numeric',
            // 'file' => 'required',
        
           ],$messages);

       $uid = Auth::user()->id;

       if ($request->file_type == 1) {
           
      


                 if ($request->file) {

        $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = preg_replace('!\s+!', ' ', $filename);
        $filename = str_replace(' ', '-', $filename);
        $filename = strtolower($filename);

        $file = $filename . '.' . $request->file->getClientOriginalExtension();

        $count = 0;
        $filecount = 1;

        while ($count < 1) {
            $hasFile = Workfile::whereFile($file)->first();
            if ($hasFile) {
                $newfilename = $filename . '_' . $filecount;
                $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                $filecount++;
            } else {
                $count++;
            }
        }

        $request->file->move(public_path('workfile/img/'), $file);


        $princ['file'] = $file;
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
            $hasFile = Workfile::whereFile($file)->first();
            if ($hasFile) {
                $newfilename = $filename . '_' . $filecount;
                $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                $filecount++;
            } else {
                $count++;
            }
        }

        $request->file->move(public_path('workfile/video/'), $file);


        $princ['file'] = $file;
    }


     }

        $princ['work_id'] = $request->work_id;
        $princ['file_type'] = $request->file_type;
        $princ['details'] = $request->details;
        $princ['title'] = $request->title;
        $princ['admin_id'] = $uid;


        WorkFile::create($princ);

        session()->flash('message', 'Page succefully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }




    public function allWorkFiles() {
    $data['title'] = "All WorkFile";
    $data['editroute'] = "edit-workfile";
    $data['droute'] = "delete-workfile";
    $data['hasCats'] = 0;
    $data['news'] = WorkFile::orderBy('id', 'desc')->get();
    return view('backend.all-workfiles', $data);
    }



public function editWorkFile($id) {
        // $data['post'] = WorkFile::findOrFail($id);
        $data['title'] = 'Edit WorkFile';
        $data['route'] = 'update-workfile';
        $data['hasCats'] = 0;
        $data['drpDwn'] = 1;
        $data['works'] = Work::orderBy('id', 'desc')->get();
        $data['post'] = WorkFile::whereId($id)->first();
        return view('backend.edit-workFile', $data);
    }

    public function updateWorkFile($id, Request $request) {

        $uprinc = WorkFile::findOrFail($id);

         $messages = [
         
            'file_type.numeric' => 'You forgot to select a choose file type!',
            'work_id.numeric' => 'You forgot to select an work!',
        ];
       $this->Validate($request, [
            'title' => 'required',
            'work_id' => 'required|numeric',
            'file_type' => 'required|numeric',
            // 'file' => 'required',
        
           ],$messages);

       $uid = Auth::user()->id;


                 if ($request->file) {

        $filename = pathinfo($request->file->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = preg_replace('!\s+!', ' ', $filename);
        $filename = str_replace(' ', '-', $filename);
        $filename = strtolower($filename);

        $file = $filename . '.' . $request->file->getClientOriginalExtension();

        $count = 0;
        $filecount = 1;

        while ($count < 1) {
            $hasFile = Workfile::whereFile($file)->first();
            if ($hasFile) {
                $newfilename = $filename . '_' . $filecount;
                $file = $newfilename . '.' . $request->file->getClientOriginalExtension();
                $filecount++;
            } else {
                $count++;
            }
        }

        $request->file->move(public_path('workfile/'), $file);


        $uprinc['file'] = $file;
    }

        $uprinc['work_id'] = $request->work_id;
        $uprinc['file_type'] = $request->file_type;
        $uprinc['details'] = $request->details;
        $uprinc['title'] = $request->title;
        $uprinc['admin_id'] = $uid;


       
        $uprinc->save();

        session()->flash('message', 'WorkFile succefully Updated!');
        Session::flash('type', 'success');
       
        return redirect()->back();

    }

    public function deleteWorkFile($id) {

        $dprinc = WorkFile::findOrFail($id);
        $dprinc->delete();

        session()->flash('message', 'WorkFile SuccessFully Delete!');
        Session::flash('type', 'error');

        return redirect()->back();

    }


















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



        // $slider = Input::except('_method','_token');
        $slider['img'] = $img;
        $slider['position'] = $slides+1;

        Slider::create($slider);
        session()->flash('message', 'Slider Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function updateSlider($id,Request $request)
    {
        $this->validate($request,[
            'position' => 'required|numeric',
            'img' => 'max:2048',
        ]);

        $slide = Slider::findOrFail($id);
        // $slides = Slider::count();


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



        // $slider = Input::except('_method','_token');
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

        $slide->delete();

        session()->flash('message', 'Slider Successfully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }





}
