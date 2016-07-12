<?php
namespace bl\analytics;

/**
 * Required Api data
 * @author Ruslan Saiko <ruslan.saiko.dev@gmail.com>
 */
interface AnalyticsInterface
{
    /** @var string Api version */
    public $v = 1;

    /** @var string Tracking ID / Property ID. */
    public $tid;

    /** @var string Anonymous Client ID. */
    public $cid;
}