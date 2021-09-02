<?php

namespace Ebay\Sell\Feed\Api;

use Ebay\Sell\Feed\Model\CreateUserScheduleRequest as CreateUserScheduleRequest;
use Ebay\Sell\Feed\Model\ScheduleTemplateCollection as ScheduleTemplateCollection;
use Ebay\Sell\Feed\Model\ScheduleTemplateResponse as ScheduleTemplateResponse;
use Ebay\Sell\Feed\Model\UpdateUserScheduleRequest as UpdateUserScheduleRequest;
use Ebay\Sell\Feed\Model\UserScheduleCollection as UserScheduleCollection;
use Ebay\Sell\Feed\Model\UserScheduleResponse as UserScheduleResponse;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class Schedule extends AbstractAPI
{
    /**
     * This method retrieves an array containing the details and status of all
     * schedules based on the specified feed_type. Use this method to find a schedule
     * if you do not know the schedule_id.
     *
     * @param array $queries options:
     *                       'feed_type'	string	The feedType associated with the schedule.
     *                       'limit'	string	The maximum number of schedules that can be returned on each page
     *                       of the paginated response. Use this parameter in conjunction with the offset
     *                       parameter to control the pagination of the output. Note: This feature employs a
     *                       zero-based list, where the first item in the list has an offset of 0. For
     *                       example, if offset is set to 10 and limit is set to 10, the call retrieves
     *                       schedules 11 thru 20 from the result set. If this parameter is omitted, the
     *                       default value is used. Default: 10 Maximum: 500
     *                       'offset'	string	The number of schedules to skip in the result set before
     *                       returning the first schedule in the paginated response. Combine offset with the
     *                       limit query parameter to control the items returned in the response. For
     *                       example, if you supply an offset of 0 and a limit of 10, the first page of the
     *                       response contains the first 10 items from the complete list of items retrieved
     *                       by the call. If offset is 10 and limit is 20, the first page of the response
     *                       contains items 11-30 from the complete result set. If this query parameter is
     *                       not set, the default value is used and the first page of records is returned.
     *                       Default: 0
     *
     * @return UserScheduleCollection
     */
    public function gets(array $queries = []): UserScheduleCollection
    {
        return $this->client->request('getSchedules', 'GET', 'schedule',
            [
                'query' => $queries,
            ]
        );
    }

    /**
     * This method creates a schedule, which is a subscription to the specified
     * schedule template. A schedule periodically generates a report for the feedType
     * specified by the template. Specify the same feedType as the feedType of the
     * associated schedule template. When creating the schedule, if available from the
     * template, you can specify a preferred trigger hour, day of the week, or day of
     * the month. These and other fields are conditionally available as specified by
     * the template. Note: Make sure to include all fields required by the schedule
     * template (scheduleTemplateId). Call the getScheduleTemplate method (or the
     * getScheduleTemplates method), to find out which fields are required or optional.
     * If a field is optional and a default value is provided by the template, the
     * default value will be used if omitted from the payload.A successful call returns
     * the location response header containing the getSchedule call URI to retrieve the
     * schedule you just created. The URL includes the eBay-assigned schedule ID, which
     * you can use to reference the schedule task. To retrieve the details of the
     * create schedule task, use the getSchedule method for a single schedule ID or the
     * getSchedules method to retrieve all schedule details for the specified
     * feed_type. The number of schedules for each feedType is limited. Error code
     * 160031 is returned when you have reached this maximum. Note: Except for
     * schedules with a HALF-HOUR frequency, all schedules will ideally run at the
     * start of each hour ('00' minutes). Actual start time may vary time may vary due
     * to load and other factors.
     *
     * @param CreateUserScheduleRequest $Model in the request payload: feedType and
     *                                         scheduleTemplateId are required; scheduleName is optional; preferredTriggerHour,
     *                                         preferredTriggerDayOfWeek, preferredTriggerDayOfMonth, scheduleStartDate,
     *                                         scheduleEndDate, and schemaVersion are conditional
     *
     * @return object
     */
    public function create(CreateUserScheduleRequest $Model): object
    {
        return $this->client->request('createSchedule', 'POST', 'schedule',
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }

    /**
     * This method retrieves schedule details and status of the specified schedule.
     * Specify the schedule to retrieve using the schedule_id. Use the getSchedules
     * method to find a schedule if you do not know the schedule_id.
     *
     * @param string $schedule_id The ID of the schedule for which to retrieve the
     *                            details. This ID is generated when the schedule was created by the
     *                            createSchedule method.
     *
     * @return UserScheduleResponse
     */
    public function get(string $schedule_id): UserScheduleResponse
    {
        return $this->client->request('getSchedule', 'GET', "schedule/{$schedule_id}",
            [
            ]
        );
    }

    /**
     * This method updates an existing schedule. Specify the schedule to update using
     * the schedule_id path parameter. If the schedule template has changed after the
     * schedule was created or updated, the input will be validated using the changed
     * template. Note: Make sure to include all fields required by the schedule
     * template (scheduleTemplateId). Call the getScheduleTemplate method (or the
     * getScheduleTemplates method), to find out which fields are required or optional.
     * If you do not know the scheduleTemplateId, call the getSchedule method to find
     * out.
     *
     * @param string                    $schedule_id The ID of the schedule to update. This ID is
     *                                               generated when the schedule was created by the createSchedule method.
     * @param UpdateUserScheduleRequest $Model       in the request payload: scheduleName is
     *                                               optional; preferredTriggerHour, preferredTriggerDayOfWeek,
     *                                               preferredTriggerDayOfMonth, scheduleStartDate, scheduleEndDate, and
     *                                               schemaVersion are conditional
     *
     * @return mixed
     */
    public function update(string $schedule_id, UpdateUserScheduleRequest $Model)
    {
        return $this->client->request('updateSchedule', 'PUT', "schedule/{$schedule_id}",
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }

    /**
     * This method deletes an existing schedule. Specify the schedule to delete using
     * the schedule_id path parameter.
     *
     * @param string $schedule_id The schedule_id of the schedule to delete. This ID
     *                            was generated when the task was created. If you do not know the schedule_id, use
     *                            the getSchedules method to return all schedules based on a specified feed_type
     *                            and find the schedule_id of the schedule to delete.
     *
     * @return mixed
     */
    public function delete(string $schedule_id)
    {
        return $this->client->request('deleteSchedule', 'DELETE', "schedule/{$schedule_id}",
            [
            ]
        );
    }

    /**
     * This method downloads the latest result file generated by the schedule. The
     * response of this call is a compressed or uncompressed CSV, XML, or JSON file,
     * with the applicable file extension (for example: csv.gz). Specify the
     * schedule_id path parameter to download its last generated file.
     *
     * @param string $schedule_id The ID of the schedule for which to retrieve the
     *                            latest result file. This ID is generated when the schedule was created by the
     *                            createSchedule method.
     *
     * @return mixed
     */
    public function getLatestResultFile(string $schedule_id)
    {
        return $this->client->request('getLatestResultFile', 'GET', "schedule/{$schedule_id}/download_result_file",
            [
            ]
        );
    }

    /**
     * This method retrieves the details of the specified template. Specify the
     * template to retrieve using the schedule_template_id path parameter. Use the
     * getScheduleTemplates method to find a schedule template if you do not know the
     * schedule_template_id.
     *
     * @param string $schedule_template_id The ID of the template to retrieve. If you
     *                                     do not know the schedule_template_id, refer to the documentation or use the
     *                                     getScheduleTemplates method to find the available schedule templates.
     *
     * @return ScheduleTemplateResponse
     */
    public function getTemplate(string $schedule_template_id): ScheduleTemplateResponse
    {
        return $this->client->request('getScheduleTemplate', 'GET', "schedule_template/{$schedule_template_id}",
            [
            ]
        );
    }

    /**
     * This method retrieves an array containing the details and status of all schedule
     * templates based on the specified feed_type. Use this method to find a schedule
     * template if you do not know the schedule_template_id.
     *
     * @param array $queries options:
     *                       'feed_type'	string	The feed type of the schedule templates to retrieve.
     *                       'limit'	string	The maximum number of schedule templates that can be returned on
     *                       each page of the paginated response. Use this parameter in conjunction with the
     *                       offset parameter to control the pagination of the output. Note: This feature
     *                       employs a zero-based list, where the first item in the list has an offset of 0.
     *                       For example, if offset is set to 10 and limit is set to 10, the call retrieves
     *                       schedule templates 11 thru 20 from the result set. If this parameter is omitted,
     *                       the default value is used. Default: 10 Maximum: 500
     *                       'offset'	string	The number of schedule templates to skip in the result set
     *                       before returning the first template in the paginated response. Combine offset
     *                       with the limit query parameter to control the items returned in the response.
     *                       For example, if you supply an offset of 0 and a limit of 10, the first page of
     *                       the response contains the first 10 items from the complete list of items
     *                       retrieved by the call. If offset is 10 and limit is 20, the first page of the
     *                       response contains items 11-30 from the complete result set. If this query
     *                       parameter is not set, the default value is used and the first page of records is
     *                       returned. Default: 0
     *
     * @return ScheduleTemplateCollection
     */
    public function getTemplates(array $queries = []): ScheduleTemplateCollection
    {
        return $this->client->request('getScheduleTemplates', 'GET', 'schedule_template',
            [
                'query' => $queries,
            ]
        );
    }
}
