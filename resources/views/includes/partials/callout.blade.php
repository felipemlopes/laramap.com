@if($callout)
    <div class="row">
        <div class="callout-block text-center fade-in-b">
            <h4>{{ $callout->title }}
                @if($callout->url)
                    <a href="{!! $callout->url !!}" class="btn btn-sm btn-primary">GO</a>
                @endif
            </h4>
            <p>{{ $callout->description }}</p>
        </div>
    </div>
@endif