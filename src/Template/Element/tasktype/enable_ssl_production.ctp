<?php echo $mediaRequest->display_name; ?>のSSL証明書配置依頼です。

■URL
<?php if ($mediaRequest->prod_reverse_proxy) : ?>
  ※リバースプロキシの利用があります！
  <?php echo $mediaSysinfo->reverse_proxy_ip_production; ?>
<?php else : ?>
  <?php echo $mediaSysinfo->domain_production; ?>
<?php endif; ?>

■リリースドメイン
<?php echo implode("\n", $mediaRequest->release_domains()) . PHP_EOL; ?>

■証明書
※個別に共有します
