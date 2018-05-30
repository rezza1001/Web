@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}}
  @endslot
  <section id="section-locations" class="section section-default pad">
    <div class="containers">
        <div class="box-head">
          <div class="titleboxs center-title">
            <h2 class="title"><span>LOCATE US</span></h2>
          </div>
         </div>{{-- .box-head--}}
{{--         <div class="categoryList">
            <a href="{{url('/')}}/locations">ALL</a>
            @foreach($categories as $category)
              <a href="{{url('/')}}/locations/{{$category->slug}}">{{$category->title}}</a>
            @endforeach
        </div> --}}
        <div class="locationMap">
           @foreach (getLocation() as $location)
              <div class="row">
                <div class="col-md-6 flex-center">
                      <div id="gmap-{{$location->id}}" class="mapContent" style="width:250px; height:250px; margin-left:auto;"></div>
                </div>
                <div class="col-md-6 flex-center">
                  <div class="address" style="margin-right:auto;">
                    <label>{{$location->locationCategory->title}}</label>
                    <h2 class="title">{!!$location->title!!}</h2>
                     {!!$location->address!!}
                  </div>
                </div>
              </div>
            @endforeach
        </div>
    </div>{{-- .container --}}
  </section>
@endcomponent