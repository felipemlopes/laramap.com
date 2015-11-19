@foreach ($activity as $event)
    @include ("users.activity.types.{$event->name}")
@endforeach