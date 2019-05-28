

@extends("partials.layout")

@section('stylesheet')
 <style>
 </style>
@endsection


@section("content")

@include("partials.header")



<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>All Activity Areas</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="featured" class="section bg-cyan">
  <div class="container">
    <div class="row">

        @foreach ($activityAreas as $item)
        <div class="col-lg-4 col-md-6 col-xs-12">
        <div class="job-featured">
          <div class="icon">
            <img src="{{ asset('img/features/img' . (($loop->index % 6) + 1) . '.png') }}" alt="">
          </div>
          <div class="content">
            <h3><a href="#">{{ $item->name }}</a></h3>
            <p class="brand">{{ $item->description }}</p>
            <span class="{{ $loop->index % 2 == 0 ? 'full':'part' }}-time">{{ $item->users->count() }} users</span>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

@endsection


@section('scripts')
<script>
    $(document).ready(function(){
        // au clic sur un lien
        $('a').on('click', function(evt){
            var target = $(this).attr('href');
            if(target[0] == '#' && target.length > 1){
                evt.preventDefault();
                $('html, body')
                    .stop()
                    .animate({scrollTop: $(target).offset().top}, 1000 );
            }
        });
    });
</script>
@endsection
