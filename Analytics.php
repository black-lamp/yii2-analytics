<?php
namespace bl\analytics;

use bl\analytics\event\Event;
use yii\base\Component;
use yii\db\ActiveRecord;

/**
 * ```php
 * \Yii::$app->analytics->event->send
 * ```
 * 
 * @property \bl\analytics\event\Event event
 *
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
class Analytics extends Component implements AnalyticsInterface
{
    
    /** @var \bl\analytics\event\Event */
    private $_event = null;

    public function init()
    {
        parent::init();
        $this->_event = \Yii::createObject(Event::className(), [
            'v' => $this->v,
            'cid' => $this->cid,
            'tid' => $this->tid,
        ]);
    }


    /**
     * @return \bl\analytics\event\Event
     */
    public function getEvent()
    {
        return $this->_event;
    }
}