<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Page;
use App\PageImg;
use App\Team;
use App\Client;
use App\Career;
use App\Apply;
use App\Work;
use App\WorkFile;
use App\Slider;
use App\AddressMap;
use App\WorkFileMeta;
use App\WorkFileImg;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

// Homepage-area-------------------->>>>
    public function index()
    {
       $data['sliders'] = Slider::orderBy('position', 'asc')->get();
        return view('frontend.home',$data);
    }

// Single page-area-------------------->>>>
    public function getSinglePage($slug) {
        $data['hasCats'] = 0;
        $page = Page::whereSlug($slug)->first();

        if ($page) {
            $id = $page->id;
        } else {
            $id = 0;
        }

        $data['page'] = Page::findOrFail($id);
        $data['eroute'] = 'edit-page';

        return view('frontend.about', $data);
    }
// Single Page Image-area-------------------->>>>
    public function getSinglePageImg($slug) {
        $data['hasCats'] = 1;
        $pageimg = PageImg::whereSlug($slug)->first();

        if ($pageimg) {
            $id = $pageimg->id;
        } else {
            $id = 0;
        }

        $data['pageimg'] = PageImg::findOrFail($id);
        $data['eroute'] = 'edit-principle';

        return view('frontend.principle', $data);
    }
// Team-area-------------------->>>>
    public function getTeam() {
        $data['teams'] = Team::orderBy('id', 'asc')->get();
        $data['eroute'] = 'edit-team';
        return view('frontend.team', $data);
    }
// Client-area-------------------->>>>
    public function getClient() {
        $data['clients'] = Client::orderBy('id', 'desc')->get();
        $data['eroute'] = 'edit-client';
        return view('frontend.clients', $data);
    }
// Career-area-------------------->>>>
    public function getCareer($slug) {
        $data['hasCats'] = 0;
        $data['eroute'] = 'edit-career';
        $page = Career::whereSlug($slug)->first();

        if ($page) {
            $id = $page->id;
        } else {
            $id = 0;
        }

        $data['page'] = Career::findOrFail($id);

        return view('frontend.career', $data);
    }


// Appliers-area-------------------->>>>

    public function addApply()
    {
        $data['title'] = 'Add Apply';
        $data['aroute'] = "post-apply";
      
        return view('frontend.career', $data);
    }

    public function postApply(Request $request)
    {
       $this->Validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:applies',
            'subject' => 'required|string|max:255',
            'up_cv' => 'required',
            'up_protfolio' => 'required',
            'mgs' => 'required|string|max:255',
            
        
        ]);

        $apply['name'] = $request->name;
        $apply['email'] = $request->email;
        $apply['subject'] = $request->subject;
        $apply['up_cv'] = $request->up_cv;
        $apply['up_protfolio'] = $request->up_protfolio;
        $apply['mgs'] = $request->mgs;

        Apply::create($apply);

        session()->flash('message', 'You Applied (Prachee Sthapati) for the job reason succefully!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


// Contact-area-------------------->>>>
    public function getContact()
    {
        $data['adms'] = AddressMap::find(1);
        return view('frontend.contact',$data);
    }
    public function getContact1()
    {
      
        return view('frontend.contact1');
    }
    public function getContact2()
    {
      
        return view('frontend.contact2');
    }
// work-area-------------------->>>>
    public function getWork()
    {
       $data['eroute'] = 'edit-work';
       $data['works'] = Work::orderBy('id', 'asc')->get();
       

        return view('frontend.work',$data);
    }
// workfile-area-------------------->>>>
    public function getAllWorkSingle($slug) 
    {
        $data['works'] = Work::orderBy('id', 'asc')->get();

        $nid = Work::whereSlug($slug)->first();

        $cats = WorkFileMeta::whereWorkId($nid->id)->get();

        $data['cats'] = $cats;

        $data['eroute'] = 'edit-workfile';

        return view('frontend.single-work', $data);
    }
// Work image slider page -area-------------------->>>>
     public function getWorkImg($slug) 
    {
        $data['works'] = Work::orderBy('id', 'asc')->get();

        $nid = WorkFile::whereSlug($slug)->first();

        $cats = WorkfileImg::whereWorkfileId($nid->id)->get();

        $data['cats'] = $cats;

        $data['eroute'] = 'edit-workfileimg';

        return view('frontend.work-img-slider', $data);
    }

}
