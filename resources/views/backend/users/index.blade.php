@extends('layouts.backend')

@section('title', 'Users')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.users.index') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
@include('partials._success',['flashSuccess'=>'status'])
<h2>Users
	&nbsp;
	<a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/users/create')}}">
	   	<i class="user add icon"></i> Add New User
	</a>
</h2>
<div id="user-table-list">
	<div class="ui left icon input table-list-search-input">
		<input type="text" class="search" placeholder="Search users..." id="user-list-search">
		 <i class="users icon"></i>
	</div>

	<div class="list-pagination top-list-pagination"></div>
	<table  class="ui celled table" cellspacing="0" width="100%">
	 	<thead>
	        <tr class="text-center">
	            <th class="sortable" data-sort="user-table-id">Id <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="user-table-role">Role <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="user-table-email">Email <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="user-table-display-name">Display Name <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="user-table-created-at">Created at <i class="sort icon"></i></th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody class="listable text-center">
	    @if(count($users))
	    	@foreach($users as $user)
		    	<tr>
		    		<td class="user-table-id">{{$user->id}}</td>
		    		<td class="user-table-role">{{$user->getRoleDisplayName()}}</td>
		    		<td class="user-table-email">{{$user->email}}</td>
		    		<td class="user-table-display-name">{{$user->display_name}}</td>
		    		<td class="user-table-created-at">{{$user->created_at->format('d M Y')}}</td>
		    		<td>
		    			<a href="{{url('dashboard/users/'.$user->id.'/edit')}}" id="edit-user-{{$user->id}}"  class="mini ui button primary"><i class="edit icon"></i> Edit</a>
		    			@if(Auth::user()->id !== $user->id)
		    				<a href="{{url('dashboard/impersonate/'.$user->id)}}" id="impersonate-user-{{$user->id}}" class="ui mini button "><i class="icon spy"></i> Login</a>
		    			@endif
		    			@if(!$user->hasRole('admin'))
		    			<form class="form-inline form-delete-user" method="POST" action="/dashboard/users/{{$user->id}}">
		    				{{csrf_field()}}
		    				 <input name="_method" type="hidden" value="DELETE">
		    				 <button class="ui mini button red" id="delete-user-{{$user->id}}" type="submit"><i class="icon remove user"></i> Delete</button>

		    			</form>
		    			@endif

		    		</td>
		    	</tr>

		    @endforeach

		@endif
			    <tr id="user-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
	    </tbody>

	</table>
<div class="list-pagination bottom-list-pagination"></div>
</div>
</div>
@endsection
