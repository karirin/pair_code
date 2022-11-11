@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')

<body>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="message">
                <h2 class="center">{{$destination_user->name}}</h2>
                @foreach ($messages as $message)
                <div class="my_message">
                    @if ($message->user_id === "$current_user->id")
                    <div class="mycomment right">
                        <span class="message_created_at">
                            {{@$message_c->convert_to_fuzzy_time($message->created_at)}}
                        </span>
                        <p>{{$message->text}}
                            @if (!empty($message->image))
                            <img src="{{asset($message->image)}}">
                            @endif
                        </p><img src="{{asset($current_user->image)}}" class="message_user_img">
                    </div>
                    @else

                    <div class="left"><img src="{{asset($destination_user->image)}}" class="message_user_img">
                        <div class="says">{{$message->text}}
                            @if (!empty($message->image))
                            <img src="{{asset($message->image)}}">
                            @endif
                        </div><span
                            class="message_created_at">{{@$message_c->convert_to_fuzzy_time($message->created_at)}}</span>
                        @endif
                    </div>
                    @endforeach

                    <div class="message_process">
                        <form method="post" action="/message/add?user_id={{$destination_user->id}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="message_text">
                                <textarea id="message_counter" class="textarea form-control" placeholder="メッセージを入力ください"
                                    name="text"></textarea>
                                <div class="counter">
                                    <span class="message_count">0</span><span>/300</span>
                                </div>
                                <input type="hidden" name="destination_user_id" value="{{$destination_user->id}}">
                                <input type="hidden" name="current_user_id" value="{{$current_user->id}}">
                            </div>
                            <div class="message_btn">
                                <div class="message_image">
                                    <label>
                                        <i class="far fa-image"></i>
                                        <input type="file" name="image" id="my_image" accept="image/*" multiple>
                                    </label>
                                </div>
                                <button class="btn btn-outline-primary" type="submit" name="post" value="post"
                                    id="post">送信</button>
                            </div>
                            <div class="message_image_detail">
                                <div><img class="my_preview"></div>
                                <i class="far fa-times-circle my_clear"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@section('footer')
@parent
@endsection
<script>
$(window).on('load', function() {
    $('html, body').scrollTop($(document).height());
});
</script>