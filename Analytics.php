<?php
namespace bl\analytics;

use bl\analytics\event\Event;
use yii\db\ActiveRecord;

/**
 * ```php
 * 'analytics' => [
 *      'class' => 'bl\analytics\Analytics',
 *      'v' => 1,                                       // Protocol version. Default value: 1
 *      'tid' => 'UA-XXXX-Y'                            // Tracking ID / Web Property ID
 *      'cid' => '35009a79-1a05-49d7-b876-2b884d0f825b' // Client ID. Random UUID (http://www.ietf.org/rfc/rfc4122.txt)
 * ]
 * ```
 *
 * ```php
 * \Yii::$app->analytics->event->send(...);
 * ```
 * @property \bl\analytics\event\Event event
 *
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
class Analytics extends BaseAnalytics
{
    /** @var \bl\analytics\event\Event */
    private $_event = null;
    
//    private $analytics = [];
    
    public function init()
    {
        parent::init();
        $this->_event = new Event($this->v, $this->cid, $this->tid);
    }


    /**
     * @return \bl\analytics\event\Event
     */
    public function getEvent()
    {
        return $this->_event;
    }
}