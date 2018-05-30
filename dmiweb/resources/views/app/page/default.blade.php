@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}} - {{$page->title}}
  @endslot
<section id="section-banner" class="section">
    <div class="thumb">
           @if (count($page->getMedia('pages')))
                    <img src="{{ url('/') }}/media/{{$page->getMedia('pages')->first()->id}}/conversions/large.png" >
              @endif
    </div>
</section>
<section id="section" class="section flex-center section-default section-white">
  <div class="container">
          <div class="box-heads">
            <div class="titlebox title-arrow-right">
              <h2 class="title"><span>{{$page->title}}</span></h2>
            </div>
           </div>{{-- .box-head--}}
           <div class="entry-content mt20">
              <div class="page-content">
                <div class="page-desc" id="page">
                    {!! $page->description !!}
                </div>
              </div>{{-- .box-footer --}}
            </div>{{-- .entry-content --}}
          </div>{{-- .box-content --}}
  </div> {{-- .container --}}
</section>
@endcomponent
