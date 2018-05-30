@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}}
  @endslot
  <section id="section-products" class="section pad">
    <div class="container">
        <div class="box-head">
          <div class="titleboxs center-title">
            <h2 class="title"><span>ROYAL ENFIELD MOTORS</span></h2>
          </div>
         </div>{{-- .box-head--}}
        <div class="productBox">
          <div class="row">
          @foreach ($categories as $category)
          <div class="productPanel col-md-3">
              @if(count($category->getMedia('products')))
              <div class="productImage">
                <a href="{{ url('/') }}/products/category/{{$category->slug}}">
                <img src="{{ url('/') }}/media/{{$category->getMedia('products')->first()->id}}/conversions/medium.png" alt="">
                </a>
              </div>
              @endif
              <div class="caption-product">
                <h3><a href="{{ url('/') }}/products/category/{{$category->slug}}">{{$category->title}}</a></h3>
              </div>
          </div>
           @endforeach
          </div>
        </div>
    </div>{{-- .container --}}
  </section>
@endcomponent