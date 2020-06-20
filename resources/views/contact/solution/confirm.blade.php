<!-- ソリューション企業お問い合わせ確認画面 -->

@extends('layouts.common')
@section('title', 'お問い合わせ内容確認')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card my-3">
                    <div class="card-header">
                        <h4>お問い合わせ内容の確認</h4>
                    </div>
                    <div class="body px-2 py-2">
                        <p>内容をご確認の上送信ボタンをクリックしてください。</p>
                        <table class="table table-striped">
                            <tr><td>お問い合わせしたい企業</td><td>{{ $contact->recipient_name }}</td></tr>
                            <tr><td>お問い合わせ項目</td><td>{{ $contact->subject }}</td></tr>
                            <tr><td>名前</td><td>{{ $contact->name }}</td></tr>
                            <tr><td>メールアドレス</td><td>{{ $contact->email }}</td></tr>
                            <tr><td>お問い合わせ内容</td><td>{{ $contact->content }}</td></tr>
                        </table>
                        <form action="{{ action('SolutionContactController@complete') }}" method="post">
                            <input type="hidden" name="recipient_id" class="form-control" id="InputrecipientId" value="{{ $contact->recipient_id }}">
                            <input type="hidden" name="recipient_name" class="form-control" id="InputrecipientName" value="{{ $contact->recipient_name }}">
                            <input type="hidden" name="subject" class="form-control" id="InputSubject" value="{{ $contact->subject }}">
                            <input type="hidden" name="name" class="form-control" id="InputName" value="{{ $contact->name }}">
                            <input type="hidden" name="email" class="form-control" id="InputEmail" value="{{ $contact->email }}">
                            <input type="hidden" name="content" class="form-control"id="InputContent" value="{{ $contact->content }}">
                            {{ csrf_field() }}
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="action" class="btn btn-secondary my-2 mx-2" value="back">戻る</button>
                                <button type="submit" name="action" class="btn btn-primary my-2 mx-4" value="sent">送信</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
