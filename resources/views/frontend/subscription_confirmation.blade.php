@extends('layouts.frontend')

@section('title', 'Subscribtion Confirmation')

@section('content')
<div class="ui segments raised">

  <div class="ui segment large">
    {!! Breadcrumbs::render('frontend.subscription',old('email')) !!}
  </div><!--end of segment-->

  <div class="ui segment teal padded">
    <h2>Subscription Confirmation</h2>
    @if($success)
    	<div class="ui message green">Thank you for confirming your email address! You are now a subscriber at our website!</div>
    @else
    	<div class="ui red green">There was a problem with confirming your email address</div>
    @endif
   </div><!--end of segment-->
</div><!--end of segments-->
@endsection
