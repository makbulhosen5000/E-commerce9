



    <!-- mission and vision start -->
    <section class="mission_vision">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            <h3 style="font-size: 1.75rem;padding-top: 10px;padding-bottom: 12px;border-bottom: 2px solid; ">
              Mission And Vision</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6" >
            <img src="{{asset('upload/user_images/'.$mission->image)}}"  style="border: 10px solid #28A745;border-radius: 26px;float: left;margin-right: 25px;" alt="">
            <p style="text-align: justify;">
              <strong>Mission</strong>
            {{$mission->title}}
            </p>
          </div>
          <div class="col-md-6">
            <img src="{{asset('upload/user_images/'.$vision->image)}}"  style="border: 10px solid #28A745;border-radius: 26px;float: left;margin-right: 25px;" alt="">
            <p style="text-align: justify;">
              <strong>Vision</strong>
            {{$vision->title}}
            </p>
          </div>
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- mission and vision end -->



    <!-- news and events start -->
    <section class="news_events">
      <div class="container">
        <div class="row" style=" padding-top:5px; " >
          <div class="col-md-4 text-center text-light">

            <h3 class="bg-dark p-2" style="border-bottom: 2px solid white;">News and Events</h3>
            <img src="{{asset('public')}}/frontend/img/im.jpg" alt="" style="width: 348px; height: 186px;margin: -10px;">

        </div>
          <div class="col-md-8">
            <table class="table  table-bordered table-hover text-center">
              <thead class="thead-dark">
                <tr>
                  <th>SL</th>
                  <th>Date</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody class="bg-light">
                 @foreach ($newsevent as $key =>$news)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{date('d-m-y',strtotime($news->date))}}</td>
                  <td><img src="{{asset('upload/user_images/'.$news->image)}}" style="height: 35px; width: 60px;" alt=""></td>
                  <td>{{$news->sort_title}}</td>
                  <td><a href="{{route('newsevent.details',$news->id)}} " class="btn btn-secondary">Details</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- container end -->
    </section>
    <!-- news and events end -->
      <!--our services-->
      <section class="service">
        <div class="container" style="width: 1159px;">
          <!-- nav tab -->
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist"  style="padding-top: 10px; ">

            @php
                $serviceCount=0;
            @endphp
            @foreach ($services as $service)
            <li class="nav-item">
              <a href="#{{$service->id}}" class="nav-link @if($serviceCount==0){ active } @endif " data-toggle="pill" href=" " role="tab" aria-controls="pills-home" aria-selected="true">{{$service->sort_title}} </a>
            </li>
            @php
            $serviceCount++
            @endphp
            @endforeach
          </ul>
          <div class="tab-content">
            @php
                $serviceCount=0;
            @endphp
             @foreach ($services as $service)
            <div id="{{$service->id}} " class=" tab-pane @if($serviceCount==0){ active } @endif">
              <h3>{{$service->sort_title}} </h3>
              <p>{{$service->long_title}} </p>
            </div>
            @php
                $serviceCount++
            @endphp
            @endforeach
          </div>
        </div>
      </section>
      {{-- service end --}}




