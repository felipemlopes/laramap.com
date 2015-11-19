<div class="message-item" id="m16">
    <div class="message-inner">
        <div class="qa-message-content">
            <strong><i class="fa fa-comment-o"></i> Left a comment on</strong>{{ $event->subject->title }} - {{ $event->created_at->diffForHumans() }}
            <br/>
            <blockquote>
                <p>{!! str_limit(Markdown::parse($event->subject->content), 250, '..') !!}</p>
            </blockquote>
        </div>
    </div>
</div>