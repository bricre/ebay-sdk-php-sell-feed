<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for a paginated result set of available
 * schedule templates. The response consists of 0 or more sequenced pages where
 * each page has 0 or more items.
 */
class ScheduleTemplateResponse extends AbstractModel
{
    /**
     * The feed type of the schedule template. Note: When calling createSchedule and
     * updateSchedule methods you must match the feed type specified by the schedule
     * template (this feedType).
     *
     * @var string
     */
    public $feedType = null;

    /**
     * This field specifies how often the schedule is generated. If set to HALF_HOUR or
     * ONE_HOUR, you cannot set a preferredTriggerHour using createSchedule or
     * updateSchedule. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:FrequencyEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $frequency = null;

    /**
     * The template name provided by the template.
     *
     * @var string
     */
    public $name = null;

    /**
     * The ID of the template. Use this ID to create a schedule based on the properties
     * of this schedule template.
     *
     * @var string
     */
    public $scheduleTemplateId = null;

    /**
     * The present status of the template. You cannot create or modify a schedule using
     * a template with an INACTIVE status. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:StatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;

    /**
     * An array of the configuration supported by this template.
     *
     * @var \Ebay\Sell\Feed\Model\SupportedConfiguration[]
     */
    public $supportedConfigurations = null;
}
