<?php
namespace App\Util;

use Cake\Http\Client;
use Cake\Core\Configure;

class BacklogComponent
{
  private $url = 'https://everforth.backlog.jp/api/v2/';
  private $key = 'GsEapUOIOM6L4kkSCBPycJAQ2VtB3UG1XFYc9lFogAAJY7UY5N6UYDPkvIlm7ans';
  private $apiKey = '?apiKey=';

  public function getClient()
    {
      $http = new Client();
        return $http;
    }

  public function getApiKey()
    {
        $key = !empty(Configure::read('App.BacklogApiKey')) ? Configure::read('App.BacklogApiKey') : $this->key;
        return $this->apiKey.$key;
    }

    public function getProjectId($dataid)
    {
        return $dataid ? $dataid : Configure::read('App.BacklogPojectId');
    }
    
    public function getMe()
    {
      $data = $this->makeRequests('get','users/myself');
        return $data;
    }

    public function getProjects($isDropdown=null)
    {
        $data = $this->makeRequests('get','projects');
        return $data;
    }

    public function getPriority($isDropdown=null)
    {
        $data = $this->makeRequests('get','priorities');
        return $data;
    }

    public function getIssueTypes($projectIdorKey=NULL)
    {

        $projectIdorKey = $this->getProjectId($projectIdorKey);
        $keyUrl = "projects/{$projectIdorKey}/issueTypes";
        $data = $this->makeRequests('get',$keyUrl);
        return $data;
    }

    public function getProjectUsers($projectIdorKey=NULL)
    {
        $projectIdorKey = $this->getProjectId($projectIdorKey);
      $keyUrl = "projects/{$projectIdorKey}/users";
        $data = $this->makeRequests('get',$keyUrl);
        return $data;
    }


    public function addIssue($params)
    {
        $keyUrl = "issues";
        $data = $this->makeRequests('post',$keyUrl,$params);
        return $data;
    }

    public function addIssueComment($issueID = 'BLOG_POTAL-309',$contents)
    {
      $data = [
      'content' => $contents,
      // 'notifiedUserId' => [1074087101],
      ];
      $keyUrl = "issues/{$issueID}/comments";
        $data = $this->makeRequests('post',$keyUrl,$data);
        return $data;
    }

    public function makeRequests($method,$keyUrl,$params=[])
    {
      $params = $this->interceptDefaultParams( $params );
      $http = new Client();
      $requestUrl = $this->url.$keyUrl.$this->getApiKey();
      $response = $http->$method($requestUrl,$params);
        return $this->responseCheckError($response);
    }

    /**
     * IMPORTANT:
     * This method overwrites the passed params as test purpose.
     */
    public function interceptDefaultParams( $params ) {
      if ( Configure::read('environment') === 'dev' ) {
        if ( isset($params['projectId']) ) $params['projectId'] = '1073868649'; // PERSONAL
        if ( isset($params['issueTypeId']) ) $params['issueTypeId'] = '1074328886'; // Task(PERSONAL)
        if ( isset($params['priorityId']) ) $params['priorityId'] = '3';
        if ( isset($params['assigneeId']) ) $params['assigneeId'] = '1073912695'; // Mitsutoshi, Watanabe
        if ( isset($params['backlog_notify_ids']) ) $params['backlog_notify_ids'] = ''; // Reset
      }
      return $params;
    }

    public function responseCheckError($response)
    {
      $data = $response->json;
        // pr($data); die();
      if (array_key_exists('errors', $data)) {
        return false;
      }
        return $data;
    }

// Dropdown sections
    public function getProjectsDropdown()
    {
        $newData = [];
        $data = $this->getProjects();
        foreach ($data as $key => $value) {
            $newData[$key]['text'] = $value['name'].' ('.$value['projectKey'].')';
            $newData[$key]['value'] = $value['id'];
        }
        return $newData;
    }

    public function getPriorityDropdown()
    {
        $data = $this->getPriority();
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[$key]['text'] = $value['name'];
            $newData[$key]['value'] = $value['id'];
        }
            return $newData;
    }

    public function getIssueTypesDropdown($projectIdorKey=null)
    {
        $data = $this->getIssueTypes($projectIdorKey);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[$key]['text'] = $value['name'];
            $newData[$key]['value'] = $value['id'];
        }
        return $newData;
    }

    public function getProjectUsersDropdown($projectIdorKey=null)
    {
        $data = $this->getProjectUsers($projectIdorKey);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[$key]['text'] = $value['name'];
            $newData[$key]['value'] = $value['id'];
        }
        return $newData;
    }


}