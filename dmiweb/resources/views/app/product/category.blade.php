@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}}
  @endslot

<br>
<div class="flex-center">
@foreach($category->products as $product)
<div>
  <div>
    <div class="caption-product">
    <a href="{{ url('/') }}/products/{{$product->slug}}"><button class="@if($product->title == $productLatest->title) Color @endif buttonColor">{{$product->title}}</button></a>
  </div>
  </div>
</div>
@endforeach
</div>

  <section id="section-banner" class="section">
    <div id="banner">
        @php 
          $i = 0;
        @endphp
            @if(count($productLatest->getMedia('products')))
              @foreach ($productLatest->getMedia('products') as $banner)
        @php 
          $i++;
        @endphp
        <div class="item">
          <div class="productImages item @if(!$loop->first) hide @endif" id="image-{{$i}}">
              <div class="product-img">
                <img src="{{ url('/')}}/media/{{$banner->id}}/conversions/medium.png" alt=""/>
              </div>
          </div>
        </div>
  @endforeach
            @endif
  </div>{{-- #banner --}}
  </section>  
        @php 
          $i = 0;
        @endphp
        <div>
          <br>
          <br>
        </div>
          <div class="flex-center">
        @foreach($productLatest->colors as $color)
        @php 
          $i++;
        @endphp
        
          <div class="flex-center jarak">
              <a href="#image-{{$i}}" class="btnColor @if(!$loop->first) active @endif"><button class="square" style="background-color: {{$color->options}};"></button></a>
              <div class="jarak2"></div>
              <a href="#image-{{$i}}" class="btnColor @if(!$loop->first) active @endif"><span class="text"> {{$color->title}}</span></a> 
          </div>
        
        @endforeach
          </div>
        
    
  <section id="section-products" class="section">
    <div class="containers">
        <div class="product-content center">
        <h1>{{$productLatest->title}}</h1>
        {!!$productLatest->description!!}
        <a href="{{url('/')}}/shop" class="button btn-primary">ORDER NOW</a>
        </div>
    </div>{{-- .container --}}
  </section>

  
  
@endcomponent