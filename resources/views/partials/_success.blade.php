@if(isset($flashSuccess) && Session::has($flashSuccess))
    <div class="ui message green">{{ Session::get($flashSuccess) }}</div>
@endif
