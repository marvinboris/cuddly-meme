
@if(Request::is('/'))
<div class="container">
    <div class="row space-100">
        <div class="col-lg-7 col-md-12 col-xs-12">
        <div class="contents">
            <h2 class="head-title">THE HIRING PLATFORM OF THE NEW WORLD</h2>
            <p>
            Hiring has never been made so easy. Join thousands of job finders today and get matched
            to the right job,the job that fits you !
            </p>
            <div class="app-button">
            <a href="#pricing" class="btn btn-common"><i class="lni-MizTechs"></i><b>I Want </b><br> <span>a new job opportunity</span></a>
            <a href="#browse-workers" class="btn btn-common btn-effect"><i class="lni-androids"></i><b> I Want </b><br> <span>to Find competences</span></a>
            </div>
        </div>
        </div>
        <div class="col-lg-5 col-md-12 col-xs-12">
        <div class="intro-img">
            <img src="{{ asset('img/intro.png') }}" alt="">
        </div>
        </div>
    </div>
</div>
@endif
