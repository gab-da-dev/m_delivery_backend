<div class="flex space-x-1 justify-around">
    @if($value == 0)
    {{Config::get('status')[0]['name']}}
    @elseif($value == 1)
    {{Config::get('status')[1]['name']}}
    @elseif($value == 2)
    {{Config::get('status')[2]['name']}}
    @endif
</div>
