@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}}
  @endslot
  <section id="section-banner" class="section">
    <div id="banner">
         <div class="headlinecarousel owl-carousel owl-theme">
            @foreach ($banners as $banner)
              @if(count($banner->getMedia('banners')))
              <div class="item">
                  <div class="banner-img">
                   <a href="{{$banner->url}}"><img  src="{{ url('/') }}/media/{{$banner->getMedia('banners')->first()->id}}/conversions/medium.jpg" /></a>
                  </div>
              </div>
              @endif
            @endforeach
        </div>{{-- .carousel --}}
    </div>{{-- #banner --}}
  </section>
  <section id="section-products" class="section">
    <div class="containers">
        <div class="productBoxs">
          <div class="flex-center">
          @foreach ($products as $product)
          <div class="productPanel">
              @if(count($product->getMedia('products')))
              <div class="productImage">
               <a href="{{ url('/') }}/products/category/{{$product->slug}}">
                <img src="{{ url('/') }}/media/{{$product->getMedia('products')->first()->id}}/conversions/small.png" alt="">
                </a>
              </div>
              @endif
              <div class="caption-product">
                <h3><a href="{{ url('/') }}/products/category/{{$product->slug}}">{{$product->title}}</a></h3>
              </div>
          </div>
           @endforeach
          </div>
        </div>
    </div>{{-- .container --}}
  </section>
  <section id="section-news" class="section">
    <div class="center-title">
      <h3>LATEST NEWS</h3>
    </div>
    <div class="containers">
        <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="box">
                  @include('app.widget.thumbnail-medium')
                  <div class="meta-title">
                    <h3 class="s-title"><a title="{{$post->title}}" href="{{ url('/') }}/news/read/{{$post->slug}}">
                        {{$post->title}}
                    </a></h3>
                    <span class="date">{{ formatdate($post->published_at)}}</span>
                                       {!!limitWord($post->summary,32)!!}
                  </div>
                </div>{{-- .flex-box --}}
            </div>{{-- .flex-box --}}
        @endforeach
      </div>{{-- .list-box --}}
    </div>{{-- .container --}}
  </section>
@endcomponent