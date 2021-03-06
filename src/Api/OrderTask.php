<?php

namespace Ebay\Sell\Feed\Api;

use Ebay\Sell\Feed\Model\CreateOrderTaskRequest as CreateOrderTaskRequest;
use Ebay\Sell\Feed\Model\OrderTask as OrderTaskModel;
use Ebay\Sell\Feed\Model\OrderTaskCollection as OrderTaskCollection;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class OrderTask extends AbstractAPI
{
    /**
     * This method returns the details and status for an array of order tasks based on
     * a specified feed_type or schedule_id. Specifying both feed_type and schedule_id
     * results in an error. Since schedules are based on feed types, you can specify a
     * schedule (schedule_id) that returns the needed feed_type. If specifying the
     * feed_type, limit which order tasks are returned by specifying filters such as
     * the creation date range or period of time using look_back_days. If specifying a
     * schedule_id, the schedule template (that the schedule_id is based on) determines
     * which order tasks are returned (see schedule_id for additional information).
     * Each schedule_id applies to one feed_type.
     *
     * @param array $queries options:
     *                       'date_range'	string	The order tasks creation date range. This range is used to
     *                       filter the results. The filtered results are filtered to include only tasks with
     *                       a creation date that is equal to this date or is within specified range. Only
     *                       orders less than 90 days old can be retrieved. Do not use with the
     *                       look_back_days parameter. Format: UTC For example: Tasks within a range
     *                       yyyy-MM-ddThh:mm:ss.SSSZ..yyyy-MM-ddThh:mm:ss.SSSZ Tasks created on September 8,
     *                       2019 2019-09-08T00:00:00.000Z..2019-09-09T00:00:00.000Z
     *                       'feed_type'	string	The feed type associated with the task. The only presently
     *                       supported value is LMS_ORDER_REPORT. Do not use with the schedule_id parameter.
     *                       Since schedules are based on feed types, you can specify a schedule
     *                       (schedule_id) that returns the needed feed_type.
     *                       'limit'	string	The maximum number of order tasks that can be returned on each
     *                       page of the paginated response. Use this parameter in conjunction with the
     *                       offset parameter to control the pagination of the output. Note: This feature
     *                       employs a zero-based list, where the first item in the list has an offset of 0.
     *                       For example, if offset is set to 10 and limit is set to 10, the call retrieves
     *                       order tasks 11 thru 20 from the result set. If this parameter is omitted, the
     *                       default value is used. Default: 10 Maximum: 500
     *                       'look_back_days'	string	The number of previous days in which to search for
     *                       tasks. Do not use with the date_range parameter. If both date_range and
     *                       look_back_days are omitted, this parameter's default value is used. Default: 7
     *                       Range: 1-90 (inclusive)
     *                       'offset'	string	The number of order tasks to skip in the result set before
     *                       returning the first order in the paginated response. Combine offset with the
     *                       limit query parameter to control the items returned in the response. For
     *                       example, if you supply an offset of 0 and a limit of 10, the first page of the
     *                       response contains the first 10 items from the complete list of items retrieved
     *                       by the call. If offset is 10 and limit is 20, the first page of the response
     *                       contains items 11-30 from the complete result set. If this query parameter is
     *                       not set, the default value is used and the first page of records is returned.
     *                       Default: 0
     *                       'schedule_id'	string	The schedule ID associated with the order task. A schedule
     *                       periodically generates a report for the feed type specified by the schedule
     *                       template (see scheduleTemplateId in createSchedule). Do not use with the
     *                       feed_type parameter. Since schedules are based on feed types, you can specify a
     *                       schedule (schedule_id) that returns the needed feed_type.
     *
     * @return OrderTaskCollection
     */
    public function gets(array $queries = []): OrderTaskCollection
    {
        return $this->client->request('getOrderTasks', 'GET', 'order_task',
            [
                'query' => $queries,
            ]
        );
    }

    /**
     * This method creates an order download task with filter criteria for the order
     * report. When using this method, specify the feedType, schemaVersion, and
     * filterCriteria for the report. The method returns the location response header
     * containing the getOrderTask call URI to retrieve the order task you just
     * created. The URL includes the eBay-assigned task ID, which you can use to
     * reference the order task. To retrieve the status of the task, use the
     * getOrderTask method to retrieve a single task ID or the getOrderTasks method to
     * retrieve multiple order task IDs. Note: The scope depends on the feed type. An
     * error message results when an unsupported scope or feed type is specified. The
     * following list contains this method's authorization scope and its corresponding
     * feed type: https://api.ebay.com/oauth/api_scope/sell.fulfillment:
     * LMS_ORDER_REPORT For details about how this method is used, see General feed
     * types in the Selling Integration Guide. Note: At this time, the createOrderTask
     * method only supports order creation date filters and not modified order date
     * filters. Do not include the modifiedDateRange filter in your request payload.
     *
     * @param CreateOrderTaskRequest $Model description not needed
     *
     * @return mixed
     */
    public function create(CreateOrderTaskRequest $Model)
    {
        return $this->client->request('createOrderTask', 'POST', 'order_task',
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }

    /**
     * This method retrieves the task details and status of the specified task. The
     * input is task_id. For details about how this method is used, see Working with
     * Order Feeds in the Selling Integration Guide.
     *
     * @param string $task_id The ID of the task. This ID is generated when the task
     *                        was created by the createOrderTask method.
     *
     * @return OrderTaskModel
     */
    public function get(string $task_id): OrderTaskModel
    {
        return $this->client->request('getOrderTask', 'GET', "order_task/{$task_id}",
            [
            ]
        );
    }
}
