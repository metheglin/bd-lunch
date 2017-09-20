<?php echo $mediaRequest->display_name; ?>のリバースプロキシ設定を追加依頼です。

■URL
<?php echo $mediaSysinfo->domain_production . PHP_EOL; ?>

■リリースドメイン
<?php echo implode("\n", $mediaRequest->release_domains()) . PHP_EOL; ?>

■SSL利用
<?php echo $mediaRequest->prod_ssl ? "有り" : "無し"; ?>
