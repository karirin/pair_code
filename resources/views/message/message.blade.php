@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-9" style="margin-left: 22%;display: inline-block;">
    <div style="background-color:#ffffffb0;width: 100%;height: 10%;position: fixed;z-index: 10;font-size: 2rem;">
        <div style="width: 17%;background-color: #fff;">
            <span style="background-color:#fdff8b0a;width: 100%;height: 100%;display: inline-block;line-height: 2;"><a href="{{ asset('message/message_top') }}" style="color: #000;"><i class="fa-solid fa-angle-left" style="margin-right: 1rem;vertical-align: text-top;font-size:2.2rem;"></i></a>{{$destination_user->name}}</span>
        </div>
    </div>
    <div class="message" style="margin-top: 5rem;">
        @foreach ($messages as $message)
        <div class="my_message">
            @if ($message->user_id === "$current_user->id")
            <div class="mycomment right">
                <span class="message_created_at">
                    {{@$message_class->convert_to_fuzzy_time($message->created_at)}}
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
                </div><span class="message_created_at">{{@$message_class->convert_to_fuzzy_time($message->created_at)}}</span>
            </div>
            @endif
        </div>
        @endforeach
        <input type="hidden" class="message_add">
        <div class="message_process" style="margin-bottom: 2rem;">
            <div class="message_text">
                <textarea id="message_counter" class="textarea form-control" placeholder="メッセージを入力ください" name="text"></textarea>
                <div class="counter">
                    <span class="message_count">0</span><span>/300</span>
                </div>
                <input type="hidden" class="destination_user_id" name="destination_user_id" value="{{$destination_user->id}}">
                <input type="hidden" class="current_user_id" name="current_user_id" value="{{$current_user->id}}">
            </div>
            <div class="message_btn">
                <div class="message_image">
                    <label>
                        <i class="far fa-image"></i>
                        <input type="file" name="image" id="my_image" accept="image/*" multiple>
                    </label>
                </div>
                <button class="btn btn-outline-primary message_btn" name="post" value="post" id="post">送信</button>
            </div>
            <div class="message_image_detail">
                <div><img class="my_preview"></div>
                <i class="far fa-times-circle my_clear"></i>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('footer')
@parent
<script>
    $(window).on('load', function() {
        $('html, body').scrollTop($(document).height());
    });
</script>
@endsection