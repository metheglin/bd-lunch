<?php echo $mediaRequest->display_name; ?>案件が始まるのでCI環境構築をお願い致します。

■希望サイト名prefix
<?php echo $mediaRequest->key(); ?>

(例)
ci-blog-provision/provision_policy.json

```
{
  "name": "<?php echo $mediaRequest->key(); ?>",
  "vcs": {
    "repository": "<?php echo $mediaSysinfo->repository; ?>"
  },
  "development": {
    "host_vendor": "ecs",
    "cluster": "blog-dev-01"
  },
  "production": {
    "host_vendor": "elasticbeanstalk",
    "group_name": "blog-portal-002",
    "beanstalk_name": "<?php echo $mediaSysinfo->server_cluster_production; ?>"
  }
}
```

```
cd ci-blog-provision/scripts/ci/
ruby job.rb
```
