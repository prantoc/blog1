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
    public function index()
    {
        // $data['hasCats'] = 0;
        // $data['sliders'] = Slider::get();
       $data['sliders'] = Slider::orderBy('id', 'asc')->get();
        return view('frontend.home',$data);
    }


    public function getSinglePage($slug) {
        // $data['title'] = 'Page';
        $data['hasCats'] = 0;
        

        $page = Page::whereSlug($slug)->first();

        if ($page) {
            $id = $page->id;
        } else {
            $id = 0;
        }

        $data['page'] = Page::findOrFail($id);
        //$data['notice'] = $page;

        // $data['hasCats'] = 0;
        $data['eroute'] = 'edit-page';
        return view('frontend.about', $data);
    }
    public function getSinglePageImg($slug) {
        // $data['title'] = 'Page';
        $data['hasCats'] = 1;
        

        $pageimg = PageImg::whereSlug($slug)->first();

        if ($pageimg) {
            $id = $pageimg->id;
        } else {
            $id = 0;
        }

        $data['pageimg'] = PageImg::findOrFail($id);
        //$data['notice'] = $pageimg;

        // $data['hasCats'] = 0;
        $data['eroute'] = 'edit-principle';
        return view('frontend.principle', $data);
    }

     public function getTeam() {
        $data['teams'] = Team::orderBy('id', 'asc')->get();

        $data['eroute'] = 'edit-team';
        return view('frontend.team', $data);
    }
public function getClient() {
        $data['clients'] = Client::orderBy('id', 'desc')->get();

        $data['eroute'] = 'edit-client';
        return view('frontend.clients', $data);
    }
public function getCareer($slug) {
            $data['hasCats'] = 0;
        

        $page = Career::whereSlug($slug)->first();

        if ($page) {
            $id = $page->id;
        } else {
            $id = 0;
        }

        $data['page'] = Career::findOrFail($id);
        //$data['notice'] = $page;

        // $data['hasCats'] = 0;
        $data['eroute'] = 'edit-career';
        return view('frontend.career', $data);
    }




    public function addApply()
    {
        $data['title'] = 'Add Apply';
        $data['aroute'] = "post-apply";
        // $data['hasCats'] = 0;
      
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
        session()->flash('message', 'You Applied (Prachee Sthapati) succefully!');
        Session::flash('type', 'success');
        return redirect()->back();
    }



    public function getContact()
    {
      
        return view('frontend.contact');
    }
    public function getContact1()
    {
      
        return view('frontend.contact1');
    }
    public function getContact2()
    {
      
        return view('frontend.contact2');
    }
    public function getWork()
    {
       $data['works'] = Work::orderBy('id', 'asc')->get();
       $data['workfiles'] = WorkFile::orderBy('id', 'desc')->get();
        return view('frontend.work',$data);
    }



}
