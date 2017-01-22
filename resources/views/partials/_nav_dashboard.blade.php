<a class="item" href="{{ url('/dashboard/profile') }}">
    <i class="user icon"></i>
    Profile
</a>
<a class="item" href="{{ url('/dashboard/favourite-articles') }}">
    <i class="heart icon"></i>
    Favourite Articles
</a>
@if(Auth::user()->hasRole('admin'))
<a class="item" href="{{ url('/dashboard/settings') }}">
    <i class="settings icon"></i>
    Settings
</a>
<a class="item" href="{{ url('/dashboard/tools') }}">
    <i class="wrench layout icon"></i>
    Tools
</a>
<a class="item" href="{{ url('/dashboard/users') }}">
    <i class="users icon"></i>
    Users
</a>
<a class="item" href="{{ url('/dashboard/subscriptions') }}">
    <i class="rss icon"></i>
    Subscriptions
</a>
@endif

@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
<a class="item" href="{{ url('/dashboard/articles') }}">
    <i class="file text outline icon"></i>
    Articles
</a>
<a class="item" href="{{ url('/dashboard/categories') }}">
    <i class="list layout icon"></i>
    Categories
</a>
<a class="item" href="{{ url('/dashboard/tags') }}">
    <i class="tags icon"></i>
    Tags
</a>
<a class="item" href="{{ url('/dashboard/media') }}">
    <i class="image icon"></i>
    Media
</a>
@endif
