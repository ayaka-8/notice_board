<!-- お悩み詳細 -->
@extends('layouts.common')
@section('title', 'お悩み詳細')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- お悩み情報 -->
            <div class="challenge-group col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">お悩み情報</h4>
                        <div class="media col-md-10 col-sm mx-auto">
                            <!--お悩みに関する画像の表示-->
                            @if($board->challenge_image != null)
                            <img src="{{ $board->challenge_image }}" class="img-fluid thumbnail align-center mr-3 mx-3" alt="お悩みに関する画像" data-toggle="modal" data-target="#chal-image-modal" style="cursor:pointer">
                            <!--モーダルで画像の表示-->
                            <div class="modal fade" id="chal-image-modal" tabindex="-1" role="dialog" aria-labelledby="enlargeImgModalLabel">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content text-center">
                                        <img src="{{ $board->challenge_image }}" width="100%" height="100%" data-dismiss="modal">
                                    </div>
                                </div>
                            </div>
                            @else
                            <img src="{{ $no_image }}" class="img-fluid mr-3 mx-3">
                            @endif
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">お悩みキーワード</h5>
                                <p>{!! nl2br($board->challenge_keyword) !!}</p>
                            </div>
                        </div>
                        <div class="challenge-others col-md-10 mx-auto px-2">
                            <h5 class="mt-2">現在の状況や課題</h5>
                            <p>{!! nl2br($board->challenge_detail) !!}</p>
                            <h5 class="mt-0">相談者が考える解決策</h5>
                            <p>{!! nl2br($board->challenge_method) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 会社情報 -->
            <div class="company-info col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">会社情報</h4>
                        <div class="media col-md-10 mx-auto">
                            <!--ロゴ画像の表示-->
                            @if($board->logo_image != null)
                            <img src="{{ $board->logo_image }}" class="img-fluid thumbnail align-center mr-3 mx-3" alt="ロゴ画像" data-toggle="modal" data-target="#logo-image-modal" style="cursor:pointer">
                            <!--モーダルで画像の表示-->
                            <div class="modal fade" id="logo-image-modal" tabindex="-1" role="dialog" aria-labelledby="enlargeImgModalLabel">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content text-center">
                                        <img src="{{ $board->logo_image }}" width="100%" height="100%" data-dismiss="modal">
                                    </div>
                                </div>
                            </div>
                            @else
                            <img src="{{ $no_image }}" class="img-fluid mr-3 mx-3">
                            @endif
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">会社名</h5>
                                <p>{{ $board->public_name }}</p>
                                <h5 class="mt-0">地域</h5>
                                <p>{{ $board->area }}</p>
                                <h5 class="mt-0">住所</h5>
                                <p>{{ $board->address }}</p>
                                <h5 class="mt-0">電話番号</h5>
                                <p>{{ $board->phone_number }}</p>
                                <h5 class="mt-0">公式サイト</h5>
                                <p>{{ $board->url }}</p>
                            </div>
                        </div>
                        <div class="message col-md-10 mx-auto px-2">
                            <h5 class="mt-2">メッセージ</h5>
                            <p>{!! nl2br($board->message) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 担当者情報 -->
            <div class="contact-info col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <h4 class="mt-2 px-2">担当者情報</h4>
                        <div class="media col-md-10 mx-auto">
                            <!--担当者に関する画像の表示-->
                            @if($board->contact_image != null)
                            <img src="{{ $board->contact_image }}" class="img-fluid thumbnail align-center mr-3 mx-3" alt="担当者に関する画像" data-toggle="modal" data-target="#cont-image-modal" style="cursor:pointer">
                            <!--モーダルで画像の表示-->
                            <div class="modal fade" id="cont-image-modal" tabindex="-1" role="dialog" aria-labelledby="enlargeImgModalLabel">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content text-center">
                                        <img src="{{ $board->contact_image }}" width="100%" height="100%" data-dismiss="modal">
                                    </div>
                                </div>
                            </div>
                            @else
                            <img src="{{ $no_image }}" class="img-fluid mr-3 mx-3">
                            @endif
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">担当者からのメッセージ</h5>
                                <p>{!! nl2br($board->contact_message) !!}</p>
                            </div>
                        </div>
                        <div class="text-center my-2 px-2">
                            <a href="{{ action('ChallengeContactController@input', ['id' => $board->id]) }}" class="btn btn-primary">担当者に聞いてみる</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 他のお悩み情報がある場合 -->
            @if(count($other_boards) > 0)
            <div class="other-info col-md-8 mx-auto">
                <h4 class="my-2">この企業が持つその他のお悩み</h4>
                @foreach($other_boards as $board)
                <div class="card my-3">
                    <div class="content px-2 py-2">
                        <div class="media col-md-10 col-sm mx-auto">
                            <!--お悩みに関する画像の表示-->
                            @if($board->challenge_image != null)
                            <img src="{{ $board->challenge_image }}" class="img-fluid mr-3 mx-3" alt="お悩みに関する画像">
                            @else
                            <img src="{{ $no_image }}" class="img-fluid mr-3 mx-3">
                            @endif
                            <div class="media-body col-md-8 col-sm mx-auto px-2">
                                <h5 class="mt-0">お悩みキーワード</h5>
                                <p>{!! nl2br($board->challenge_keyword) !!}</p>
                            </div>
                        </div>
                        <div class="text-right my-2 px-2">
                            <a href="{{ action('ChallengeBoardController@show', ['id' => $board->id]) }}" class="btn btn-primary">詳細ページへ</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
