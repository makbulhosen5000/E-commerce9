@extends('frontend/layouts.master')
@section('content')

<!-- contact us section start -->
<section class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h3 style="padding-top: 10px; padding-bottom: 5px; border-bottom:black solid 2px; width:139px;">Contact Us</h3>
           <form action="{{route('Contact.Store')}}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
               <div class="row bg-danger" >
                   <div class="col-md-6 ">
                    @if(Session::has('success'))
                      <div class="btn btn-warning">{{Session::get('success')}} </div>
                    @endif
                       <div class="form-group">
                           <label for="my-input">Name</label>
                           <input id="my-input" class="form-control" type="text" name="name"placeholder="Enter your name" required>
                       </div>
                       <div class="form-group">
                        <label for="my-input">Phone</label>
                        <input id="my-input" class="form-control" type="tel" name="phone" placeholder="Enter your Phone"required>
                       </div>
                       <div class="form-group">
                        <label for="my-input">E-Mail</label>
                        <input id="my-input" class="form-control" type="email" name="email" placeholder="Enter your Email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="my-input">Massage</label>
                        <textarea name="massage" id="" cols="40" rows="8" placeholder="Enter your Massage" required></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" class=" btn btn-warning float-right">Send Massage</button>
                       </div>
                    </div>
               </div>
           </form>
        </div>
        <div class="col-md-5">
            <h3 style="padding-top: 10px; padding-bottom: 5px; border-bottom:black solid 2px; width:193px;">Office Location</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.303783957308!2d90.40506581364963!3d23.878844184526216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c4367d2f6e7f%3A0xb50c20a659c6d4f3!2z4Ka44Ka-4Kay4Kau4Ka-IOCmruCmvuCmsOCnjeCmleCnh-Cmnywg4KaX4KeL4Kef4Ka-4Kay4Kaf4KeH4KaV!5e0!3m2!1sbn!2sbd!4v1586877619035!5m2!1sbn!2sbd" width="100%" height="310px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
      </div>
    </div>
    {{-- container end --}}
  </section>
  <!-- contactUs section end -->

@endsection







