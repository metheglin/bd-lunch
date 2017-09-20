<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Medianotify cell
 */
class MedianotifyCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('MediaRequests');
        $options = [
            'conditions'=>[
                'MediaRequests.isdel is null',
                'MediaRequests.isactive' => true,
                'MediaRequests.status is NULL'
            ],
            'contains'=>[],
            'order'=>['MediaRequests.created'=>'DESC']
        ];
        $newMedias = $this->MediaRequests->find('all',$options)->all();
        // pr($newMedias); die();
        $newMediaRequstCount = $newMedias->count();
        $this->set(compact('newMedias','newMediaRequstCount'));
    }
}
