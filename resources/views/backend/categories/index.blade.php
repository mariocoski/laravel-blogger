@extends('layouts.backend')

@section('title', 'Page Title')

@section('content')
<div class="ui segment large">
  {!! Breadcrumbs::render('backend.categories.index') !!}
</div><!--end of segment-->

<div class="ui segment teal padded">
@include('partials._success',['flashSuccess'=>'status'])
<h2>Categories
	&nbsp;
	<a class="ui right floated tiny primary labeled icon button" href="{{url('dashboard/categories/create')}}">
	   	<i class="plus add icon"></i> Add New Category
	</a>
</h2>

<div class="ui left icon input table-list-search-input">
	<input type="text" placeholder="Search categories..." id="category-list-search">
	 <i class="list layout icon"></i>
</div>

<div id="category-table-list">
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
	    @if(isset($categories) && count($categories))
	    	@foreach($categories as $category)
		    	<tr>
		    		<td class="category-table-id">{{$category->id}}</td>
		    		<td class="category-table-name">{{$category->name}}</td>
		    		<td class="category-table-slug">{{$category->slug}}</td>
		    		<td class="category-table-articles-count">{{$category->articles_count}}</td>
		    		<td class="category-table-created-at">{{$category->created_at->format('d M Y')}}</td>
		    		<td>
		    			<a href="{{url('dashboard/categories/'.$category->id.'/edit')}}" id="edit-category-{{$category->id}}"  class="mini ui button orange"><i class="edit icon"></i> Edit</a>
		    			<form class="form-inline form-delete-category" method="POST" action="/dashboard/categories/{{$category->id}}">
		    				{{csrf_field()}}
		    				 <input name="_method" type="hidden" value="DELETE">
		    				 <button class="ui mini button red" id="delete-category-{{$category->id}}" type="submit"><i class="icon remove category"></i> Delete</button>

		    			</form>
		    		</td>
		    	</tr>

		    @endforeach

		@endif
			    <tr id="category-table-no-results" style="display:none;"><td colspan="7">No results</td></tr>
	    </tbody>

	</table>
<div class="list-pagination bottom-list-pagination"></div>
</div>
</div>
@endsection
