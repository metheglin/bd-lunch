<?php echo $mediaRequest->display_name; ?>案件が始まるのでステージング環境構築をお願い致します。

■希望サイト名prefix
<?php echo $mediaRequest->key() . PHP_EOL; ?>

■ECS登録json

/tmp/<?php echo $mediaRequest->key(); ?>-development.json

```
{
  "containerDefinitions": [
    {
      "volumesFrom": [],
      "memory": 64,
      "portMappings": [],
      "essential": true,
      "mountPoints": [],
      "name": "<?php echo $mediaRequest->key(); ?>-development",
      "environment": [
        {
          "name": "VIRTUAL_HOST",
          "value": "<?php echo $mediaRequest->key(); ?>-development.blog.everforth.com"
        }
      ],
      "image": "894026212588.dkr.ecr.ap-northeast-1.amazonaws.com/ac-blog-dev/<?php echo $mediaRequest->key(); ?>-development",
      "cpu": 1
    }
  ],
  "volumes": [],
  "family": "<?php echo $mediaRequest->key(); ?>-development"
}
```

* AWS consoleからの登録の場合
https://ap-northeast-1.console.aws.amazon.com/ecs/home?region=ap-northeast-1#/taskDefinitions/create

* コマンドラインからの登録の場合

```
aws ecs register-task-definition --family <?php echo $mediaRequest->key(); ?>-development --cli-input-json file:///tmp/<?php echo $mediaRequest->key(); ?>-development.json
```
