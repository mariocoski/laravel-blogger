@if(isset($categories) && count($categories))
    @foreach($categories as $category)
        <a class="item" href="/categories/{{$category['slug']}}">{{$category['name']}}</a>
    @endforeach

    @if($numberOfCategories>5)
    	<a class="item" style="background-color: #f3f3f3 !important; font-weight: bold !important;" href="/categories">View all {{$numberOfCategories}} categories</a>
    @endif
@endif
