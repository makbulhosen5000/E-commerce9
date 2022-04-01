<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Mission;
use App\Models\Newsevent;
use App\Models\Vision;
use App\Models\Service;
use App\Models\About;
use App\Models\ContactUs;
use Session;
use Mail;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //all header function is here
    public function index()
    {
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        $data['mission']=Mission::first();
        $data['vision']=Vision::first();
        $data['services']=Service::all();
        $data['newsevent']=Newsevent::orderBy('id','desc')->get();
        return view('frontend.layouts.home',$data);
    }
    public function AboutUs()
    {
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        $data['about_us']=About::first();
        return view('frontend.singlePages.aboutUs',$data);
    }
    public function ContactUs(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        return view('frontend.singlePages.contactUs',$data);
    }
    public function MiSsion(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        return view('frontend.singlePages.mission',$data);
    }
    public function ViSion(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        return view('frontend.singlePages.vision',$data);
    }
   public function NewsEventDetails($id){
      $data['logo']=Logo::first();
      $data['sliders']=Slider::all();
      $data['contacts']=Contact::first();
      $data['newsevent']=Newsevent::find($id);
      return view('frontend.singlePages.newsevent-details',$data);
   }

    public function Store(Request $request)
    {
        $contactUs=new ContactUs();
        $contactUs->name=$request->name;
        $contactUs->phone=$request->phone;
        $contactUs->email=$request->email;
        $contactUs->massage=$request->massage;
        $contactUs->save();
        $mail=array(
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'massage'=>$request->massage
        );
        Mail::send('frontend.Email.email-contact',$mail, function($MailMassage)use($mail){
            $MailMassage->from($mail['email'],'CodingDuck');
            $MailMassage->to('mhakash5000@gmail.com');
            $MailMassage->subject('Thank you so much for contact with us');
        });
        Session::flash('success','Massage Sent Successfully');
        return redirect()->back();
    }

    public function UserEmailView()
    {
        $mail['userEmail']=ContactUs::orderBy('id','desc')->get();
        return view('frontend.Email.user-email-view',$mail);
    }


    public function destroy($id)
    {
        $contactUs=ContactUs::find($id);
        $contactUs->delete();
        return redirect()->back();

    }
}
