<?php

// Composerでインストールしたライブラリを一括読み込み
  require_once __DIR__ . '/vendor/autoload.php';

// アクセストークンを使いCurlHTTPClientをインスタンス化
  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('kGxlKnqE9XpSljsTSn55fiS4CSzb90Q5J8Qb9YifkcRtWokFiPur08HYIdVlwXfhhMkLufiQn3nQzTO7J0h4/zzuEBmUHL8iSn38LsPkWzK0GD5dtag7OwVjLmva7atXUdz83MYniy9VzCPoJ1JMrWDNKEV4tduUv0NICtwdB04t89/1O/w1cDnyilFU='));
  // CurlHTTPClientとシークレットを使いLINEBotをインスタンス化
  $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getnev('22bf2f05131002dab13c5afd8f0c15fc')]);
  // LINE Messaging APIがリクエストに付与した署名を取得
  $singnature = $_SERVER['HTTP' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
  // 署名が正当かチェック。正当であればリクエストをパースし配列へ
  $events = $bot->parseEventRequst(file_get_contents('php://input'),
      $singnature);
      // 配列の格納された各イベントをループで処理
      foreach ($envents as $event) {
        // テキストを返信
        $bot->replyText($event->getReplyToken(), 'TextMessage');
      }
?>