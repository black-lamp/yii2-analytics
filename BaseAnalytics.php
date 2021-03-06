<?php
namespace bl\analytics;
use yii\base\Component;

/**
 * Required Api data
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
abstract class BaseAnalytics extends Component
{
    
    /** @var string Api version */
    public $v = 1;

    /** @var string Tracking ID / Property ID. */
    public $tid;

    /** @var string Anonymous Client ID. */
    public $cid;
}