<div class="message-item" id="m16">
    <div class="message-inner">
        <div class="qa-message-content">
            <strong><i class="fa fa-newspaper-o"></i> Created article: </strong>"<a href="{{ url('@'.$event->user->username.'/article/'.$event->subject->slug) }}">{{ $event->subject->title }}</a>" - {{ $event->created_at->diffForHumans() }}
        </div>
    </div>
</div>

