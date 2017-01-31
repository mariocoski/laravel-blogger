@extends('layouts.backend')

@section('title', 'Subscriptions')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.subscriptions') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
 <h2>Subscribers</h2>
 @if($subscribers && count($subscribers)>0)
  <table class="ui celled table">
  <thead>
    <tr>
      <th>Email</th>
      <th>Subscription date</th>
      <th>IP address</th>
      <th>Is confirmed</th>
    </tr>
  </thead>
  <tbody>

	@foreach($subscribers as $subscriber)

	<tr>
      <td>{{$subscriber->email}}</td>
	  <td>{{$subscriber->created_at->diffForHumans()}}</td>
	  <td>{{$subscriber->ip_address}}</td>
	  <td><i class="{{($subscriber->is_confirmed)? 'checkmark green ' : 'minus red'}} icon"></i> {{($subscriber->is_confirmed)?"Confirmed":"Not confirmed" }}</td>
    </tr>

	@endforeach
  </tbody>
  </table>
@else
	<div class="ui message yellow">You don't have any subscribers yet</div>
@endif

</div>
@endsection
