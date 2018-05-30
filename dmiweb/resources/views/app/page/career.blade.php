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
<section id="section" class="section flex-center section-default">
  <div class="container">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
    @foreach ($careers as $career)
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="{{$career->slug}}">
        <h4 class="panel-title">
          <a  @if (!$loop->first) class="collapsed" @endif  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$career->slug}}" aria-expanded="false" aria-controls="collapse-{{$career->slug}}">
            {{$career->title}}
          </a>
        </h4>
      </div>
      <div id="collapse-{{$career->slug}}" class="panel-collapse collapse @if ($loop->first) in @endif" role="tabpanel" aria-labelledby="{{$career->slug}}">
        <div class="panel-body">
         {!!$career->description!!}
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div> {{-- .container --}}
</section>
@endcomponent
