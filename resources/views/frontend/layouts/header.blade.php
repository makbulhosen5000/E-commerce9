@php
    $count=0;
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('public')}}/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('public')}}/frontend/css/style.css">

    <body>

        <!-- header section start -->
        <section class="header">
                <!-- container start -->
           <div class="container">
                 <nav class="navbar navbar-expand-lg navbar-light bg-success">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                         <a href="{{url('/')}} " class="navbar-brand"><img src="{{asset('upload/user_images/'.$logo->image)}}" style=" height: 35px; width: 47px;" alt=""></a>
                       <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                         <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                         </li>
                         <li class="nav-item dropdown">
                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               About
                             </a>
                             <div class="dropdown-menu "  style="background-color:chartreuse;"  aria-labelledby="navbarDropdownMenuLink">
                               <a class="dropdown-item" href="{{route('aboutUs')}} ">About Us</a>
                               <a class="dropdown-item" href="{{route('mission')}} ">Mission</a>
                               <a class="dropdown-item" href="{{route('vision')}} ">Vision</a>
                             </div>
                           </li>
                           <li class="nav-item active">
                             <a class="nav-link" href="{{route('contactUs')}}">Contact Us <span class="sr-only">(current)</span></a>
                           </li>
                         <li class="nav-item">
                           <a class="nav-link" href="{{route('login')}} ">Login</a>
                         </li>
                       </ul>
                       <form class="form-inline my-2 my-lg-0">
                         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                       </form>
                     </div>
                   </nav>
             </div>
            <!-- container end -->
        </section>
      <!-- header section end -->

       <!-- Slider Section start -->
     <section class="slider">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 @foreach($sliders as $key=> $slider)
               <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="@if($count==0){ active } @endif"></li>
                @endforeach
             </ol>
             <div class="carousel-inner" role="listbox">
                @foreach ($sliders as $slider)
               <div class="carousel-item @if($count==0){ active } @endif " style="background-image: url('{{asset('upload/user_images/'.$slider->image)}}">
                 <div class="carousel-caption d-none d-md-block">
                   <h2 class="display-4">{{$slider->sort_title}}</h2>
                   <p class="lead" >{{$slider->long_title}}</p>
                 </div>
             </div>
               @php
                   $count++
               @endphp
               @endforeach
             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
                 </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
            </div>
           </div>
         <!-- container end -->
          </section>
         <!-- slider section end -->
