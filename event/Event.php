<?php
namespace bl\analytics\event;
use bl\analytics\Analytics;
use bl\analytics\AnalyticsInterface;
use frontend\assets\AnalyticsAsset;
use yii\base\Object;
use yii\httpclient\Client;

/**
 * \Yii::$app->analytics->event->send([
 *      't' => 'event',     // Event hit type.
 *      'ec' => 'video',    // Event Category. Required.
 *      'ea' => 'play',     // Event Action. Required.
 *      'el' => 'holiday',  // Event label.
 *      'ev' => 300,        // Event value.
 * ]);
 *
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
class Event extends Object implements AnalyticsInterface
{

    /** @var string Api URL */
    public $baseUrl = 'http://www.google-analytics.com';

    /** @var \yii\httpclient\Client */
    protected $_httpClient = null;
    public function init()
    {
        parent::init();
        $this->_httpClient = \Yii::createObject('\yii\httpclient\Client', [
            'baseUrl' => $this->baseUrl
        ]);
    }


    /**
     * $event = \Yii::createObject('\bl\analytics\event\Event', ['v' => 1, 'tid' => 'UA-XXXXX-Y', 'cid' => 555]);
     *
     * $event->send([
     *      't' => 'event',     // Event hit type.
     *      'ec' => 'video',    // Event Category. Required.
     *      'ea' => 'play',     // Event Action. Required.
     *      'el' => 'holiday',  // Event label.
     *      'ev' => 300,        // Event value.
     * ]);
     * @param $data array
     */
    public function send($data)
    {
        $response = $this->_httpClient->createRequest()
            ->setMethod('post')
            ->setUrl('collect')
            ->setData($data)
            ->send();

        if ($response->isOk) {
            die(var_dump($response->data));
        }
        die(var_dump($response->data));

    }
}