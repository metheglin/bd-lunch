■APPID
<?php echo $mediaSysinfo->appid . PHP_EOL; ?>

■用途
Server（phpsdk用）

```
cd WebAPISetting/tool
./create-template.rb <?php echo $company->code; ?> <?php echo $company->code; ?> <?php echo $company->code; ?>
./gen-ac.rb <?php echo $company->code; ?> <?php echo $mediaSysinfo->appid; ?> Server
```

※ git push後、WebAPISettingのjenkinsタスクが稼働し、利用可能になります
