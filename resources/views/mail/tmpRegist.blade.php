@extends('layouts.top')
@section('title', 'pair code')
@section('header')
@parent
@endsection
@section('content')
仮登録が完了しました。以下のURLへアクセスして登録を完了させてください。
<a href="{{$url}}">{{$url}}</a>
@endsection
@section('footer')
@parent
@endsection