<?php
/***
* How the variable access into the templetes files
*
*
*/

// Get current Task name 
echo $task->name

// Get MediaRequest info
echo $task->media_request->media_mode;

// Get MediaSysinfo 
echo $task->media_sysinfo->appid;





// the main data objects
Object
(
    [id] => 1
    [media_request_id] => 1
    [task_type_id] => 1
    [alias] => appid
    [name] => Create Appid
    [content] => This appid is `Brandsite` and Media scope is `Company` testing `www.google.com`
    [backlog_progress_url] => https://everforth.backlog.jp/view/PERSONAL-53
    [chatwork_progress_url] => https://www.chatwork.com/#!rid80356142-953939894944661504
    [state] => 2
    [requirements] => 
    [dependencies] => media_brands
    [artifacts] => appid,console_account
    [isactive] => 1
    [media_sysinfo] => Object
        (
            [id] => 1
            [media_request_id] => 1
            [repository] => 
            [appid] => hello
            [apikey_dev] => 
            [apikey_prd] => 
            [apikey_browser_dev] => 
            [apikey_browser_prd] => 
            [console_account] => 
            [staging_domain] => 
            [ecs_cluster_name_dev] => 
            [ecs_cluster_ip_dev] => 
            [production_domain] => 
            [elasticbeanstalk_env_name_prod] => 
            [reverse_proxy_host] => 
            [is_ssl] => 
            [staging_ci_url] => 
            [production_ci_url] => 
            [staging_server_manage_url] => 
            [production_server_manage_url] => 
            [status] => 
            [isactive] => 1
        )

    [media_request] => Object
        (
            [id] => 1
            [company_id] => 1
            [name] => test tigers
            [display_name] => Test sites
            [media_mode] => Brandsite
            [media_scope] => Company
            [media_scope_desc] => sites
            [media_brands] => brands
            [release_domains] => www.google.com
            [director_chatids] => chatwork1,chatwork2
            [use_apikey_server] => 1
            [use_apikey_browser] => 1
            [use_production] => 1
            [prod_reverse_proxy] => 1
            [prod_ssl] => 1
            [use_staging] => 1
            [use_crossmedia] => 1
            [use_ranking] => 1
            [hostedby_everforth] => 1
            [status] => 1
            [isactive] => 1
        )

    [templete_text] => 
)

?>

