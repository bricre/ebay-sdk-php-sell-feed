<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for a schedule update to a schedule generated
 * with the Feed API.
 */
class UpdateUserScheduleRequest extends AbstractModel
{
    /**
     * The preferred day of the month to trigger the schedule. This field can be used
     * with preferredTriggerHour for monthly schedules. The last day of the month is
     * used for numbers larger than the actual number of days in the month. This field
     * is available as specified by the template (scheduleTemplateId). The template can
     * specify this field as optional or required, and optionally provides a default
     * value. Minimum: 1 Maximum: 31.
     *
     * @var int
     */
    public $preferredTriggerDayOfMonth = null;

    /**
     * The preferred day of the week to trigger the schedule. This field can be used
     * with preferredTriggerHour for weekly schedules. This field is available as
     * specified by the template (scheduleTemplateId). The template can specify this
     * field as optional or required, and optionally provides a default value. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:DayOfWeekEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $preferredTriggerDayOfWeek = null;

    /**
     * The preferred two-digit hour of the day to trigger the schedule. This field is
     * available as specified by the template (scheduleTemplateId). The template can
     * specify this field as optional or required, and optionally provides a default
     * value. Format: UTC hhZ For example, the following represents 11:00 am UTC: 11Z
     * Minimum: 00Z Maximum: 23Z.
     *
     * @var string
     */
    public $preferredTriggerHour = null;

    /**
     * The timestamp on which the schedule (report generation) ends. After this date,
     * the schedule status becomes INACTIVE. Use this field, if available, to end the
     * schedule in the future. This value must be later than scheduleStartDate (if
     * supplied). This field is available as specified by the template
     * (scheduleTemplateId). The template can specify this field as optional or
     * required, and optionally provides a default value. Format: UTC yyyy-MM-ddTHHZ
     * For example, the following represents UTC October 10, 2021 at 10:00 AM:
     * 2021-10-10T10Z.
     *
     * @var string
     */
    public $scheduleEndDate = null;

    /**
     * The schedule name assigned by the user for the created schedule.
     *
     * @var string
     */
    public $scheduleName = null;

    /**
     * The timestamp to start generating the report. After this timestamp, the schedule
     * status becomes active until either the scheduleEndDate occurs or the
     * scheduleTemplateId becomes inactive. Use this field, if available, to start the
     * schedule in the future but before the scheduleEndDate (if supplied). This field
     * is available as specified by the template (scheduleTemplateId). The template can
     * specify this field as optional or required, and optionally provides a default
     * value. Format: UTC yyyy-MM-ddTHHZ For example, the following represents a
     * schedule start date of UTC October 01, 2020 at 12:00 PM: 2020-01-01T12Z.
     *
     * @var string
     */
    public $scheduleStartDate = null;

    /**
     * The schema version of the feedType for the schedule. This field is required if
     * the feedType has a schema version. This field is available as specified by the
     * template (scheduleTemplateId). The template can specify this field as optional
     * or required, and optionally provides a default value.
     *
     * @var string
     */
    public $schemaVersion = null;
}
