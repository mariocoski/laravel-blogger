@extends('layouts.backend')

@section('title', 'Tags')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.tags.index') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
@include('partials._success',['flashSuccess'=>'status'])
<h2>Tags
	&nbsp;
	<a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/tags/create')}}">
	   	<i class="plus add icon"></i> Add New Tag
	</a>
</h2>



<div id="tag-table-list">

<div class="ui left icon input table-list-search-input">
	<input type="text" class="search" placeholder="Search tags..." id="tag-list-search">
	 <i class="tags icon"></i>
</div>
<div class="list-pagination top-list-pagination"></div>
	<table  class="ui celled table" cellspacing="0" width="100%">
	 	<thead>
	        <tr class="text-center">
	            <th class="sortable" data-sort="tag-table-id"> Id <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="tag-table-name">Name <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="tag-table-slug">Slug <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="tag-table-articles-count">Number of articles <i class="sort icon"></i></th>
	            <th class="sortable" data-sort="tag-table-created-at">Created at <i class="sort icon"></i></th>
	            <th>Actions</th>
	        </tr>
	    </thead>
	    <tbody class="listable text-center">
	    @if(isset($tags) && count($tags))
	    	@foreach($tags as $tag)
		    	<tr>
		    		<td class="tag-table-id">{{$tag->id}}</td>
		    		<td class="tag-table-name">{{$tag->name}}</td>
		    		<td class="tag-table-slug">{{$tag->slug}}</td>
		    		<td class="tag-table-articles-count">{{$tag->articles_count}}</td>
		    		<td class="tag-table-created-at">{{$tag->created_at->format('d M Y')}}</td>
		    		<td>
		    			<a href="{{url('dashboard/tags/'.$tag->id.'/edit')}}" id="edit-tag-{{$tag->id}}"  class="mini ui button primary"><i class="edit icon"></i> Edit</a>
		    			@if(Auth::user()->hasRole('admin'))
		    			<form class="form-inline form-delete-tag" method="POST" action="/dashboard/tags/{{$tag->id}}">
		    				{{csrf_field()}}
		    				 <input name="_method" type="hidden" value="DELETE">
		    				 <button class="ui mini button red" id="delete-tag-{{$tag->id}}" type="submit"><i class="icon remove tag"></i> Delete</button>

		    			</form>
		    			@endif
		    		</td>
		    	</tr>

		    @endforeach

		@endif
			    <tr id="tag-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
	    </tbody>

	</table>
<div class="list-pagination bottom-list-pagination"></div>
</div>
</div>
@endsection
