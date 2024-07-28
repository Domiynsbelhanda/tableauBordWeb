<div>
    @foreach($notifications as $notification)
        <div>
            <a href="{{ $notification->data['url'] }}">{{ $notification->data['message'] }}</a>
        </div>
    @endforeach
</div>
