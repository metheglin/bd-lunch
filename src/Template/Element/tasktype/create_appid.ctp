■APPID例
<?php echo $mediaRequest->example_appid() . PHP_EOL; ?>

■メディア表示名
<?php echo $mediaRequest->display_name . PHP_EOL; ?>

■環境
<?php
  if ( $mediaRequest->use_staging ) {
    $env_list[] = "ステージング環境";
  }
  if ( $mediaRequest->use_production ) {
    $env_list[] = "本番環境";
  }
  echo implode("、", $env_list) . PHP_EOL;
?>

■会社名
<?php echo $mediaRequest->company->name . PHP_EOL; ?>

■ブランド名
<?php echo $mediaRequest->media_brands . PHP_EOL; ?>

■スコープ
<?php echo $mediaRequest->media_scope . PHP_EOL; ?>
<?php echo !empty($mediaRequest->media_scope_desc) ? "※${$mediaRequest->media_scope_desc}" : ""; ?>


<?php if ( $mediaRequest->hasConsoleAccount() ): ?>
■既存アカウント
※以下の既存アカウントが存在します
<?php echo $mediaRequest->company->console_account; ?>
<?php endif; ?>

■固有タグ追加
プラットフォーム固有タグ追加もお願いします。
ac.*: system-system-0-committee-apparelcloud
