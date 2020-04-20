<div class="grid lg:grid-cols-3 gap-4">
    @foreach($movie->getMedia('gallery') as $item)
        <div>{{ $item }}</div>
    @endforeach
</div>
