@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')
@include('partials._success',['flashSuccess'=>'status'])
<h2>Tags
	&nbsp;
	<a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/tags/create')}}">
	   	<i class="plus add icon"></i> Add New Tag
	</a>
</h2>

<div class="ui left icon input table-list-search-input">
	<input type="text" placeholder="Search tags..." id="tag-list-search">
	 <i class="list layout icon"></i>
</div>

<div id="tag-table-list">
<div class="list-pagination top-list-pagination"></div>
	<table  class="ui celled table" cellspacing="0" width="100%">
	 	<thead>
	        <tr class="text-center">
	            <th>Id</th>
	            <th>Name</th>
	            <th>Slug</th>
	            <th>Number of articles</th>
	            <th>Created at</th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody class="list text-center">
	    @if(isset($tags) && count($tags))
	    	@foreach($tags as $tag)
		    	<tr>
		    		<td class="tag-table-id">{{$tag->id}}</td>
		    		<td class="tag-table-name">{{$tag->name}}</td>
		    		<td class="tag-table-slug">{{$tag->slug}}</td>
		    		<td class="tag-table-articles-count">{{$tag->articles_count}}</td>
		    		<td class="tag-table-created-at">{{$tag->created_at->format('d M Y')}}</td>
		    		<td>
		    			<a href="{{url('dashboard/tags/'.$tag->id.'/edit')}}" id="edit-tag-{{$tag->id}}"  class="mini ui button orange"><i class="edit icon"></i> Edit</a>
		    			<form class="form-inline form-delete-tag" method="POST" action="/dashboard/tags/{{$tag->id}}">
		    				{{csrf_field()}}
		    				 <input name="_method" type="hidden" value="DELETE">
		    				 <button class="ui mini button red" id="delete-tag-{{$tag->id}}" type="submit"><i class="icon remove tag"></i> Delete</button>

		    			</form>
		    		</td>
		    	</tr>

		    @endforeach

		@endif
			    <tr id="tag-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
	    </tbody>

	</table>
<div class="list-pagination bottom-list-pagination"></div>
</div>

@endsection
