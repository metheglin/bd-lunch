<?php echo $mediaRequest->display_name; ?>のランキング集計開始依頼です。

■APPID
<?php echo $mediaSysinfo->appid . PHP_EOL; ?>

■リリースドメイン
<?php echo implode("\n", $mediaRequest->release_domains()) . PHP_EOL; ?>

■stagingドメイン
<?php if ( $mediaSysinfo->domain_staging ): ?>
  <?php echo $mediaSysinfo->domain_staging; ?>
<?php else : ?>
  <?php echo $mediaRequest->key(); ?>-development.blog.everforth.com（想定）
<?php endif; ?>
