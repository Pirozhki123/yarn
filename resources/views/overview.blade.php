@extends('layouts.app')

@section('title', '備品一覧')

@section('content')
    <div class="row center-block">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 p-3 center-block bg-light rounded">
            <h1 class="mb-4 h1">システム概要</h1>
            <div class="mb-4">
                <h3 class="h3">1. 概要</h3>
                <p>
                    本ウェブアプリケーションは、機械の状態や遷移を記録し、稼働状況の見える化とエビデンスの取得を目的としたものです。<br>
                    ユーザーは自身の作業により機械のステータスに変更が加わる場合に、本アプリケーションを使用して報告を行います。<br>
                    報告に基づき機械のステータスが自動で変更され、稼働率などが算出されます。
                </p>
            </div>
            <div class="mb-4">
                <h3 class="h3">2. 主な機能</h3>
                <ul>
                    <li class="mb-2"><strong>報告機能</strong>
                        <ul>
                            <li>ユーザーによる機械状態の変更報告</li>
                            <li>報告履歴の閲覧</li>
                        </ul>
                    </li>
                    <li class="mb-2"><strong>機械ステータス管理</strong>
                        <ul>
                            <li>機械の状態（稼働中、停止中、メンテナンス中など）の記録・変更</li>
                            <li>状態変更の履歴管理</li>
                            <li>稼働率の自動計算</li>
                        </ul>
                    </li>
                    <li class="mb-2"><strong>管理者機能</strong>
                        <ul>
                            <li>機械のステータス管理</li>
                            <li>ユーザー管理</li>
                            <li>備品情報の管理</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="mb-4">
                <h3 class="h3">3. 期待される効果</h3>
                <ul>
                    <li>・機械の稼働状況の可視化による業務改善</li>
                    <li>・記録の自動化による報告業務の効率化</li>
                    <li>・正確なエビデンスの取得によるトラブル対応の迅速化</li>
                </ul>
            </div>

            <div class="mb-4">
                <h3 class="h3">4. システム構成</h3>
                <ul>
                    <li><strong>フロントエンド</strong>: Laravel / jQuery.js</li>
                    <li><strong>バックエンド</strong>: Laravel</li>
                    <li><strong>データベース</strong>: MariaDB</li>
                    <li><strong>ホスティング</strong>: AWS</li>
                </ul>
            </div>

            <div class="mb-4">
                <h3 class="h3">5. 作業フロー</h3>
                <image src="{{asset("image/Flow.png")}}" alt="IMG" class="block w-auto fill-current text-gray-800 ">
            </div>

            <div class="mb-4">
                <h3 class="h3">6. DB構成</h3>
                <image src="{{asset("image/ER.png")}}" alt="IMG" class="block w-auto fill-current text-gray-800 ">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
