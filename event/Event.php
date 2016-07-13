<?php
namespace bl\analytics\event;
use bl\analytics\BaseAnalytics;
use yii\base\Object;
use yii\helpers\ArrayHelper;
use yii\httpclient\Client;

/**
 * \Yii::$app->analytics->event->send([
 *      'ec' => 'video',    // Event Category. Required.
 *      'ea' => 'play',     // Event Action. Required.
 *      'el' => 'holiday',  // Event label.
 *      'ev' => 300,        // Event value.
 * ]);
 *
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
class Event extends BaseAnalytics
{

    /** @var string Api URL */
    public $baseUrl = 'https://ssl.google-analytics.com/collect';

    public function __construct($v, $cid, $tid, array $config = null)
    {
        parent::__construct($config);

        $this->tid = $tid;
        $this->v = $v;
        $this->cid = $cid;
    }


    /** @var \yii\httpclient\Client */
    protected $_httpClient = null;

    public function init()
    {
        parent::init();

        $this->_httpClient = new Client();

        $this->_httpClient->baseUrl = $this->baseUrl;
    }


    /**
     * $event = \Yii::createObject('\bl\analytics\event\Event', ['v' => 1, 'tid' => 'UA-XXXXX-Y', 'cid' => 555]);
     *
     * $event->send([
     *      'ec' => 'video',    // Event Category. Required.
     *      'ea' => 'play',     // Event Action. Required.
     *      'el' => 'holiday',  // Event label.
     *      'ev' => 300,        // Event value.
     * ]);
     * @param $data array
     */
    public function send($data)
    {
        $v = $this->v;
        $cid = $this->cid;
        $tid = $this->tid;
        $t = 'event';
        $response = $this->_httpClient->createRequest()
            ->setMethod('post')
            ->setUrl('collect')
            ->setData(ArrayHelper::merge($data, compact('v','tid','cid', 't')))
            ->send();
    }
}