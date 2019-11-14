<div class="container">
    <div class="row d-flex flex-column">
        <h3 class="m-1">{{ $title }}</h3>
        @if ($title !== 'null')
            <p class="m-1 mb-3 desc">{{ $subtitle }}</p>
        @endif
    </div>
</div>