<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\About;
use App\Models\ContactUs;
use App\Models\CountDownTimer;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSubImage;
use Session;
use Mail;


class FrontendController extends Controller
{
    //all header function is here
    public function index()
    {
        $data['timers']=CountDownTimer::first();
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
        $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products']=Product::orderBy('id','desc')->paginate(12);
        return view('frontend.layouts.home',$data);
    }
    //__ ProductList function__ //
    public function ProductList(){
    $data['logo']=Logo::first();
    $data['contacts']=Contact::first();
    $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
    $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products']=Product::orderBy('id','desc')->paginate(12);
    return view('frontend.single-pages.product-list',$data);
    }
    //__ Category Wise Product function__ //
    public function CategoryWiseProduct($category_id){
    $data['logo']=Logo::first();
    $data['contacts']=Contact::first();
    $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
    $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products']=Product::where('category_id',$category_id)->orderBy('id','desc')->get();
    return view('frontend.single-pages.category-wise-product',$data);
    }
    //__ Brand Wise Product function__ //
    public function BrandWiseProduct($brand_id){
    $data['logo']=Logo::first();
    $data['contacts']=Contact::first();
    $data['categories']=Product::select('category_id')->groupBy('category_id')->get();
    $data['brands']=Product::select('brand_id')->groupBy('brand_id')->get();
    $data['products']=Product::where('brand_id',$brand_id)->orderBy('id','desc')->get();
    return view('frontend.single-pages.brand-wise-product',$data);
    }

 
    //__ Product Details function__ //
    public function ProductDetails($slug){
    $data['logo']=Logo::first();
    $data['contacts']=Contact::first();
    $data['product']=Product::where('slug',$slug)->first();
    $data['product_sub_images']=ProductSubImage::where('product_id',$data['product']->id)->get();
    $data['product_colors']=ProductColor::where('product_id',$data['product']->id)->get();
    $data['product_sizes']=ProductSize::where('product_id',$data['product']->id)->get();
    return view('frontend.single-pages.product-details',$data);
    }

    //__ Shoping Cart function__ //
    public function ShopingCart(){
    $data['logo']=Logo::first();
    $data['contacts']=Contact::first();
    return view('frontend.single-pages.shopping-cart',$data);
    }
    //__ About Us function__ //
    public function AboutUs()
    {
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        $data['about_us']=About::first();
        return view('frontend.single-pages.about-us',$data);
    }
       //__ Contact Us function__ //
    public function ContactUs(){
        $data['logo']=Logo::first();
        $data['sliders']=Slider::all();
        $data['contacts']=Contact::first();
        return view('frontend.single-pages.contact-us',$data);
    }
    //__ Store Contact Us function__ //
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
        //__ User Email function for Contact Us__ //
        public function UserEmailView()
        {
            $mail['userEmail']=ContactUs::orderBy('id','desc')->get();
            return view('frontend.Email.user-email-view',$mail);
        }
    //__ Contact Us Delete function__ //
    public function destroy($id)
    {
        $contactUs=ContactUs::find($id);
        $contactUs->delete();
        return redirect()->back();

    }

   
}
