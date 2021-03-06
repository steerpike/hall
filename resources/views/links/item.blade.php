<div class="py-5 border-b border-gray-400">
<a href="{{ $link->url }}">{{ $link->title }} ({{ $link->created_at->format('d-m-Y') }})</a>
<div class="flex">
    <div class="px-4">
        <h3>Description</h3>
        <p>{{ $link->description }}</p>
    </div>
    <div class="px-4">
        <h3>Notes</h3>
        <p>{{ $link->notes }}</p>
    </div>
</div>
<ul>
    @foreach ($link->machinetags as $machinetag)
        <li><a class="text-xs" href="{{route('tagged', ['machinetag'=>$machinetag->namespace.':'.$machinetag->predicate.'='.$machinetag->value])}}">{{$machinetag->namespace}}:{{$machinetag->predicate}}={{$machinetag->value}}</a></li>
    @endforeach
</ul>
</div>