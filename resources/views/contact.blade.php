

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
          <h3>Contact</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<section id="contact" class="section">
  <div class="contact-form">
    <div class="container">
      <div class="row contact-form-area">
        <div class="col-md-12 col-lg-6 col-sm-12">
          <div class="contact-block">
            <h2>Contact Form</h2>
            <form action="{{ route('contact') }}" method="POST">
                @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="contact-name" placeholder="Name" required data-error="Please enter your name">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="contact-email" required data-error="Please enter your email">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="contact-subject" required data-error="Please enter your subject">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message" rows="5" name="contact-msg" data-error="Write your message" required></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="submit-button">
                    <button class="btn btn-common" id="submit" type="submit">Send Message</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-12 col-lg-6 col-sm-12">
          <div class="contact-right-area wow fadeIn">
            <h2>Contact Address</h2>
            <div class="contact-info">
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="lni-map-marker"></i>
                </div>
                <p>Main Office: Rue Mandessi Bell, Kayo Elie-BALI,Douala-CAMEROUN <br> Dev and Innov Head of Dept +237655728725. Douala-CAMEROUN</p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="lni-envelope"></i>
                </div>
                <p>Customer Support: <a href="mailto:hello@tom.com">support@workoo.net</a></p>
                <p>Technical Support:<a href="mailto:tomsaulnier@gmail.com"> support@workoo.net </a></p>
              </div>
              <div class="single-contact">
                <div class="contact-icon">
                  <i class="lni-phone-handset"></i>
                </div>
                <p><a href="#">Main Office:      +237655728725  </a></p>
                <p><a href="#">Customer Supprort:  +237655728725</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
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
