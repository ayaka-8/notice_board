<!-- お悩み企業向けプロフィール編集画面　-->
@extends('layouts.common')
@section('title', 'プロフィール編集')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('ChallengeProfileController@update') }}" method="post" enctype="multipart/form-data">
                    <!-- エラーメッセージ の表示 -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            入力に問題があります。再入力してください。
                        </div>
                    @endif
                    <!--　エラーがあれば編集中の内容を表示（全項目）　-->
                    <div class="form-group row">
                        <label class="col-md-3" >会社名 (公開名)</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="public_name" value="{{ old('public_name', $my_profile->public_name) }}">
                            @if ($errors->has('public_name'))
                            <div class="text-danger">
                                {{$errors->first('public_name')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">会社ロゴ</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="logo_image">
                            <div class="form-text text-info">
                                設定中: {{ old('logo_image', $my_profile->logo_image) }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">地域名</label></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="area" value="{{ old('area', $my_profile->area) }}">
                            @if ($errors->has('area'))
                            <div class="text-danger">
                                {{$errors->first('area')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">住所</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="address" rows="3">{{ old('address', $my_profile->address) }}</textarea>
                            @if ($errors->has('address'))
                            <div class="text-danger">
                                {{$errors->first('address')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">電話番号</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $my_profile->phone_number) }}">
                            @if ($errors->has('phone_number'))
                            <div class="text-danger">
                                {{$errors->first('phone_number')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">公式サイト</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="url" value="{{ old('url', $my_profile->url) }}">
                            @if ($errors->has('url'))
                            <div class="text-danger">
                                {{$errors->first('url')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">お悩みに関するキーワード</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_keyword" row="3">{{ old('challenge_keyword', $my_profile->challenge_keyword) }}</textarea>
                            @if ($errors->has('challenge_keyword'))
                            <div class="text-danger">
                                {{$errors->first('challenge_keyword')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">現在の状況や課題</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_detail" row="10">{{ old('challenge_detail', $my_profile->challenge_detail) }}</textarea>
                            @if ($errors->has('challenge_detail'))
                            <div class="text-danger">
                                {{$errors->first('challenge_detail')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">お悩みに関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="challenge_image">
                            <div class="form-text text-info">
                                設定中: {{ old('challenge_image', $my_profile->challenge_image) }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">相談者が考える解決策</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="challenge_method" row="10">{{ old('challenge_method', $my_profile->challenge_method) }}</textarea>
                            @if ($errors->has('challenge_method'))
                            <div class="text-danger">
                                {{$errors->first('challenge_method')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">メッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="message" row="10">{{ old('message', $my_profile->message) }}</textarea>
                            @if ($errors->has('message'))
                            <div class="text-danger">
                                {{$errors->first('message')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者からのメッセージ</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="contact_message" row="10">{{ old('contact_message', $my_profile->contact_message) }}</textarea>
                            @if ($errors->has('contact_message'))
                            <div class="text-danger">
                                {{$errors->first('contact_message')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者に関する画像</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control-file" name="contact_image">
                            <div class="form-text text-info">
                                設定中: {{ old('contact_image', $my_profile->contact_image) }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">担当者メールアドレス</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="contact_email" value="{{ old('contact_email', $my_profile->contact_email) }}">
                            @if ($errors->has('contact_email'))
                            <div class="text-danger">
                                {{$errors->first('contact_email')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-10">
                        <input type="hidden" name="id" value="{{ $my_profile->id }}">
                        <input type="hidden" name="user_id" value="{{ $my_profile->user_id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection