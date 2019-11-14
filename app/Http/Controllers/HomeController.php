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
use App\WorkfileImg;
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
        $data['adms'] = AddressMap::find(1);
        return view('frontend.home',$data);
    }

// Single page-area-------------------->>>>
    public function getSinglePage($slug) {
        $data['hasCats'] = 0;
        $data['adms'] = AddressMap::find(1);
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
         $data['adms'] = AddressMap::find(1);
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
         $data['adms'] = AddressMap::find(1);
        $data['teams'] = Team::orderBy('id', 'asc')->get();
        $data['eroute'] = 'edit-team';
        return view('frontend.team', $data);
    }
// Client-area-------------------->>>>
    public function getClient() {
         $data['adms'] = AddressMap::find(1);
        $data['clients'] = Client::orderBy('id', 'desc')->get();
        $data['eroute'] = 'edit-client';
        return view('frontend.clients', $data);
    }
// Career-area-------------------->>>>
    public function getCareer($slug) {
        $data['hasCats'] = 0;
         $data['adms'] = AddressMap::find(1);
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
         $data['adms'] = AddressMap::find(1);
      
        return view('frontend.career', $data);
    }

    public function postApply(Request $request)
    {

                $messages = [
         
            'name.required' => 'The name filed is required !',
            'email.required' => 'The email filed is required !',
            'email.unique' => 'Your email address has been already taken !',
            'subject.required' => 'The subjectfiled is required !',
            'up_cv.required' => 'The upload cv filed is required !',
            'up_cv.mimes' => 'The upload cv must be doc, docx, pdf file !',
            'up_protfolio.required' => 'The upload protfolio filed is required !',
            'up_protfolio.mimes' => 'The upload protfolio must be doc, docx, pdf file !',
            'mgs.required' => 'The messages filed is required !',
        ];
     

       $this->Validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:applies',
            'subject' => 'required|string|max:255',
            'up_cv' => 'required|file|mimes:doc,docx,pdf|max:5120',
            'up_protfolio' => 'required|file|mimes:doc,docx,pdf|max:5120',
            'mgs' => 'required|string|max:255',
            
        
        ],$messages);


        if ($request->up_cv) {
            $up_cvname = pathinfo($request->up_cv->getClientOriginalName(), PATHINFO_FILENAME);

            $up_cvname = preg_replace('!\s+!', ' ', $up_cvname);
            $up_cvname = str_replace(' ', '-', $up_cvname);
            // $up_cvname = strtolower($up_cvname);

            $up_cv = $up_cvname . '.' . $request->up_cv->getClientOriginalExtension();
            // $up_cv = 'Con_'.$lcon. '_' . $up_cv;

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Apply::whereUpCv($up_cv)->first();
                if ($hasImg) {
                    $newimgname = $up_cv . '_' . $imgcount;
                    $up_cv = $newimgname . '.' . $request->up_cv->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->up_cv->move(public_path('uploaded_cv/'), $up_cv);

            

             $apply['up_cv'] = $up_cv;
             // $apply->save();
        }

        if ($request->up_protfolio) {
            $up_protfolioname = pathinfo($request->up_protfolio->getClientOriginalName(), PATHINFO_FILENAME);

            $up_protfolioname = preg_replace('!\s+!', ' ', $up_protfolioname);
            $up_protfolioname = str_replace(' ', '-', $up_protfolioname);
            // $up_protfolioname = strtolower($up_protfolioname);

            $up_protfolio = $up_protfolioname . '.' . $request->up_protfolio->getClientOriginalExtension();
            // $up_protfolio = 'Con_'.$lcon. '_' . $up_protfolio;

            $count = 0;
            $imgcount = 1;

            while ($count < 1) {
                $hasImg = Apply::whereUpProtfolio($up_protfolio)->first();
                if ($hasImg) {
                    $newimgname = $up_protfolio . '_' . $imgcount;
                    $up_protfolio = $newimgname . '.' . $request->up_protfolio->getClientOriginalExtension();
                    $imgcount++;
                } else {
                    $count++;
                }
            }

            $request->up_protfolio->move(public_path('uploaded_cv/'), $up_protfolio);

            

             $apply['up_protfolio'] = $up_protfolio;
             // $apply->save();
        }

        $apply['name'] = $request->name;
        $apply['email'] = $request->email;
        $apply['subject'] = $request->subject;
        // $apply['up_cv'] = $request->up_cv;
        // $apply['up_protfolio'] = $request->up_protfolio;
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
 
// work-area-------------------->>>>
    public function getWork()
    {
       $data['eroute'] = 'edit-work';
       $data['works'] = Work::orderBy('position', 'asc')->get();
        $data['adms'] = AddressMap::find(1);
       

        return view('frontend.work',$data);
    }
// workfile-area-------------------->>>>
    public function getAllWorkSingle($slug) 
    {
         $data['adms'] = AddressMap::find(1);
        $data['works'] = Work::orderBy('id', 'asc')->get();

        $nid = Work::whereSlug($slug)->first();

        $cats = WorkFile::whereWorkId($nid->id)->get();

        $data['cats'] = $cats;

        $data['eroute'] = 'edit-workfile';

        return view('frontend.single-work', $data);
    }
// Work image slider page -area-------------------->>>>
     public function getWorkImg($slug) 
    {
         $data['adms'] = AddressMap::find(1);
        $data['works'] = Work::orderBy('id', 'asc')->get();

        $nid = WorkFile::whereSlug($slug)->first();

        $cats = WorkfileImg::whereWorkfileId($nid->id)->get();

        $data['cats'] = $cats;

        $data['eroute'] = 'edit-workfileimg';

        return view('frontend.work-img-slider', $data);
    }

}
