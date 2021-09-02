<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for a paginated result set of available
 * schedules. The response consists of 0 or more sequenced pages where each page
 * has 0 or more items.
 */
class UserScheduleResponse extends AbstractModel
{
    /**
     * The ID of the schedule. This ID is generated when the schedule was created by
     * the createSchedule method.
     *
     * @var string
     */
    public $scheduleId = null;

    /**
     * The creation date of the schedule in hours based on the 24-hour Coordinated
     * Universal Time (UTC) clock.
     *
     * @var string
     */
    public $creationDate = null;

    /**
     * The feedType associated with the schedule.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * The date the schedule was last modified.
     *
     * @var string
     */
    public $lastModifiedDate = null;

    /**
     * The preferred day of the month to trigger the schedule. This field can be used
     * with preferredTriggerHour for monthly schedules. The last day of the month is
     * used for numbers larger than the number of days in the month.
     *
     * @var int
     */
    public $preferredTriggerDayOfMonth = null;

    /**
     * The preferred day of the week to trigger the schedule. This field can be used
     * with preferredTriggerHour for weekly schedules. For implementation help, refer
     * to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:DayOfWeekEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $preferredTriggerDayOfWeek = null;

    /**
     * The preferred two-digit hour of the day to trigger the schedule. Format: UTC hhZ
     * For example, the following represents 11:00 am UTC: 11Z.
     *
     * @var string
     */
    public $preferredTriggerHour = null;

    /**
     * The timestamp on which the report generation (subscription) ends. After this
     * date, the schedule status becomes INACTIVE.
     *
     * @var string
     */
    public $scheduleEndDate = null;

    /**
     * The schedule name assigned by the user for the created schedule. Users assign
     * this name for their reference.
     *
     * @var string
     */
    public $scheduleName = null;

    /**
     * The timestamp that indicates the start of the report generation.
     *
     * @var string
     */
    public $scheduleStartDate = null;

    /**
     * The ID of the template used to create this schedule.
     *
     * @var string
     */
    public $scheduleTemplateId = null;

    /**
     * The schema version of the feedType for the schedule.
     *
     * @var string
     */
    public $schemaVersion = null;

    /**
     * The enumeration value that indicates the state of the schedule. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:StatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;

    /**
     * The reason the schedule is inactive. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:StatusReasonEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $statusReason = null;
}
