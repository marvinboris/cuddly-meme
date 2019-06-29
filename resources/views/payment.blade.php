
@extends("partials.layout")

@section('stylesheet')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cryptocoins/css/cryptocoins.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cryptocoins/css/cryptocoins-colors.css') }}">
@endsection


@section("content")

@parent

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Payment</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="content" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-xs-12">
                <div class="page-login-form box">
                    <h3>Complete The Payment By Choosing a method </h3>

                    <h3> World Wide - With Cryptocurrencies </h3>
                    <form action="https://www.coinpayments.net/index.php" method="post">
                        <input type="hidden" name="cmd" value="_pay_simple">
                        <input type="hidden" name="reset" value="1">
                        <input type="hidden" name="merchant" value="305e526de20c8da45211ce1e3ccbbd8b">
                        <input type="hidden" name="item_name" value="Workoo subscription">
                        <input type="hidden" name="invoice" value="{{ $user->id }}">
                        <input type="hidden" name="item_desc" value="Workoo subscription">
                        <input type="hidden" name="currency" value="USD">
                        <input type="hidden" name="amountf" value="1.00000000">
                        <input type="hidden" name="want_shipping" value="0">
                        <input type="hidden" name="success_url" value="https://workoo.net">
                         <button type="submit" class="btn btn-primary-outline" style="background:transparent">
                             <i class="cc BTC fa-4x" aria-hidden="true"></i>
                             <i class="cc XRP fa-4x" aria-hidden="true"></i>
                             <i class="cc ETH fa-4x" aria-hidden="true"></i>
                             <i class="cc BCH fa-4x" aria-hidden="true"></i>
                         </button> 
                    </form>

                    <h3> Visa - Master card </h3>
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <a href="{{ $visa->redirectUrl }}"><i class="fa fa-cc-mastercard fa-4x card" style="color:red"></i></a>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ $visa->redirectUrl }}"><i class="fa fa-cc-visa fa-4x card" style="color:blue"></i></a>
                        </div>
                        
                    </div>

                     <h3> For West Africa And Cameroon </h3>
                        <a href="#" class="west-africa"> <img src="https://secure.cinetpay.com/img/om_resized.png" style="width:75px;height:40px"></a>
                        <a href="#" class="west-africa"> <img src="https://secure.cinetpay.com/img/momo_resized.png" style="width:75px;height:40px"></a>
                        <a href="#" class="west-africa"> <img src="https://secure.cinetpay.com/img/flooz_resized.png" style="width:75px;height:40px"></a>
                    <br/> <br/>
                     <h3> For Central Africa except Cameroon </h3>
                        <a href="{{ $monetbil['link'] }}"> <img src="https://secure.cinetpay.com/img/om_resized.png" style="width:75px;height:40px"></a>
                        <a href="{{ $monetbil['link'] }}"> <img src="https://secure.cinetpay.com/img/momo_resized.png" style="width:75px;height:40px"></a>
                        {{ $cinetpay->displayPayButton('cinetpay',2,'large')}}
                    <br/> <br/>

                 </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
<script>
    var btn = document.querySelectorAll('.west-africa');
    var form = document.querySelector('#cinetpay');
    form.style.display = "none";
    for(var i=0; i<btn.length; ++i){
        btn[i].addEventListener('click',(e)=>{
            e.preventDefault();

            document.querySelector('#cinetpay').submit();
        })
    }
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
