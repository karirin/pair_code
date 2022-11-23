@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
<div class="col-9" style="margin-left: 22%;">
    <h3 class="page_title">メッセージ</h3>
    @foreach ($message_relations as $message_relation)
    <div class="message_list">
        <a href='message?user_id={{$message_relation->destination_user_id}}' id="message_link">
            <div class="destination_user_list">
                <div class='col-11 destination_user_info'>

                    <img src="{{asset($message_relation->image)}}" class="message_user_img">
                    <div class="destination_user_info_detail">
                        <div class="destination_user_name">{{$message_relation->name}}</div>
                        <div class="destination_user_message_info">
                            <span
                                class="destination_user_text">{{@$message_relation->getNewmessage($current_user->id,$message_relation->destination_user_id)}}</span>
                            <span id="message_count">
                                @if($message_relation->message_count!=0){{@$message_relation->getNewmessagecount($current_user->id,$message_relation->destination_user_id)}}@elseif($message_relation->message_count=='match')マッチしたユーザーにメッセージを送りましょう@endif
                            </span>
                        </div>
                    </div>

                    <div class="col-3">
                        <!-- <span
                                class="new_message_time">< convert_to_fuzzy_time($new_message['created_at']); ?></span> -->
                    </div>
                </div>
        </a>
        <button class="btn modal_btn message_list_delete" data-target="#delete_modal{{$message_relation->id}}"
            type="button" data-toggle="delete" title="削除"><i class="far fa-trash-alt"></i></button>
        <div class="delete_confirmation" id="delete_modal{{$message_relation->id}}">
            <p class="modal_title">こちらのユーザーとのメッセージを削除しますか？</p>
            <p class="post_content">{{$message_relation->name}}</p>
            <form action="message_list_delete.php" method="post">
                <input type="hidden" name="user_id" value="{{$current_user->id}}">
                <input type="hidden" name="destination_user_id" value="{{$message_relation->destination_user_id}}">
                <button class="btn btn-outline-primary modal_close" type="button">閉じる</button>
                <button class="btn btn-outline-danger" type="submit" name="delete" value="delete">削除</button>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('footer')
@parent
@endsection