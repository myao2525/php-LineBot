<?php

// Composerでインストールしたライブラリを一括読み込み
  require_once __DIR__ . '/vendor/autoload.php';

// アクセストークンを使いCurlHTTPClientをインスタンス化
  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(getenv('CHANNEL_SECRET'));
  // CurlHTTPClientとシークレットを使いLINEBotをインスタンス化
  $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => getenv('CHANNEL_ACCESS_TOKEN')]);
  // LINE Messaging APIがリクエストに付与した署名を取得
  $signature = $_SERVER['HTTP' . \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
  // 署名が正当かチェック。正当であればリクエストをパースし配列へ
  $events = $bot->parseEventRequest(file_get_contents('php://input'),
      $signature);
      // 配列の格納された各イベントをループで処理
      foreach ($envents as $event) {
        // テキストを返信
        $bot->replyText($event->getReplyToken(), 'TextMessage');
      }
?>