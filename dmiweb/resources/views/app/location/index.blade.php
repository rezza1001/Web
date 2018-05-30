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
        <div class="categoryList">
            <a href="{{url('/')}}/locations">ALL</a>
            @foreach($categories as $category)
              <a href="{{url('/')}}/locations/{{$category->slug}}">{{$category->title}}</a>
            @endforeach
        </div>
        <div class="locationMap">
            <div id="gmap" style="width: 100%; height: 400px;"></div>

            </div>
        </div>
    </div>{{-- .container --}}
  </section>
@endcomponent