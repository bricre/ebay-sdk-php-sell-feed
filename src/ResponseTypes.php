<?php

namespace Ebay\Sell\Feed;

use OpenAPI\Runtime\ResponseTypes as AbstractResponseTypes;

class ResponseTypes extends AbstractResponseTypes
{
    public static $types = [
        'getOrderTasks' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\OrderTaskCollection',
        ],
        'getOrderTask' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\OrderTask',
        ],
        'getInventoryTasks' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\InventoryTaskCollection',
        ],
        'getInventoryTask' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\InventoryTask',
        ],
        'getSchedules' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\UserScheduleCollection',
        ],
        'createSchedule' => [
            '201.' => null,
        ],
        'getSchedule' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\UserScheduleResponse',
        ],
        'getScheduleTemplate' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\ScheduleTemplateResponse',
        ],
        'getScheduleTemplates' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\ScheduleTemplateCollection',
        ],
        'getTasks' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\TaskCollection',
        ],
        'getTask' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\Task',
        ],
        'uploadFile' => [
            '200.' => null,
        ],
        'getCustomerServiceMetricTasks' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\CustomerServiceMetricTaskCollection',
        ],
        'getCustomerServiceMetricTask' => [
            '200.' => 'Ebay\\Sell\\Feed\\Model\\ServiceMetricsTask',
        ],
    ];
}
