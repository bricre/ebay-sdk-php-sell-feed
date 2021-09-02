<?php

namespace Ebay\Sell\Feed\Api;

use Ebay\Sell\Feed\Model\CreateTaskRequest as CreateTaskRequest;
use Ebay\Sell\Feed\Model\Task as TaskModel;
use Ebay\Sell\Feed\Model\TaskCollection as TaskCollection;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class Task extends AbstractAPI
{
    /**
     * This method returns the details and status for an array of tasks based on a
     * specified feed_type or scheduledId. Specifying both feed_type and scheduledId
     * results in an error. Since schedules are based on feed types, you can specify a
     * schedule (schedule_id) that returns the needed feed_type. If specifying the
     * feed_type, limit which tasks are returned by specifying filters, such as the
     * creation date range or period of time using look_back_days. Also, by specifying
     * the feed_type, both on-demand and scheduled reports are returned. If specifying
     * a scheduledId, the schedule template (that the schedule ID is based on)
     * determines which tasks are returned (see schedule_id for additional
     * information). Each scheduledId applies to one feed_type.
     *
     * @param array $queries options:
     *                       'date_range'	string	Specifies the range of task creation dates used to filter
     *                       the results. The results are filtered to include only tasks with a creation date
     *                       that is equal to this date or is within specified range. Only tasks that are
     *                       less than 90 days can be retrieved. Note: Maximum date range window size is 90
     *                       days. Valid Format (UTC):yyyy-MM-ddThh:mm:ss.SSSZ..yyyy-MM-ddThh:mm:ss.SSSZ For
     *                       example: Tasks created on September 8, 2019
     *                       2019-09-08T00:00:00.000Z..2019-09-09T00:00:00.000Z
     *                       'feed_type'	string	The feed type associated with the tasks to be returned. Only
     *                       use a feedType that is available for your API: Order Feeds: LMS_ORDER_ACK,
     *                       LMS_ORDER_REPORT Large Merchant Services (LMS) Feeds: See Available FeedTypes Do
     *                       not use with the schedule_id parameter. Since schedules are based on feed types,
     *                       you can specify a schedule (schedule_id) that returns the needed feed_type.
     *                       'limit'	string	The maximum number of tasks that can be returned on each page of
     *                       the paginated response. Use this parameter in conjunction with the offset
     *                       parameter to control the pagination of the output. Note: This feature employs a
     *                       zero-based list, where the first item in the list has an offset of 0. For
     *                       example, if offset is set to 10 and limit is set to 10, the call retrieves tasks
     *                       11 thru 20 from the result set. If this parameter is omitted, the default value
     *                       is used. Default: 10 Maximum: 500
     *                       'look_back_days'	string	The number of previous days in which to search for
     *                       tasks. Do not use with the date_range parameter. If both date_range and
     *                       look_back_days are omitted, this parameter's default value is used. Default: 7
     *                       Range: 1-90 (inclusive)
     *                       'offset'	string	The number of tasks to skip in the result set before returning
     *                       the first task in the paginated response. Combine offset with the limit query
     *                       parameter to control the items returned in the response. For example, if you
     *                       supply an offset of 0 and a limit of 10, the first page of the response contains
     *                       the first 10 items from the complete list of items retrieved by the call. If
     *                       offset is 10 and limit is 20, the first page of the response contains items
     *                       11-30 from the complete result set. If this query parameter is not set, the
     *                       default value is used and the first page of records is returned. Default: 0
     *                       'schedule_id'	string	The schedule ID associated with the task. A schedule
     *                       periodically generates a report for the feed type specified by the schedule
     *                       template (see scheduleTemplateId in createSchedule). Do not use with the
     *                       feed_type parameter. Since schedules are based on feed types, you can specify a
     *                       schedule (schedule_id) that returns the needed feed_type.
     *
     * @return TaskCollection
     */
    public function gets(array $queries = []): TaskCollection
    {
        return $this->client->request('getTasks', 'GET', 'task',
            [
                'query' => $queries,
            ]
        );
    }

    /**
     * This method creates an upload task or a download task without filter criteria.
     * When using this method, specify the feedType and the feed file schemaVersion.
     * The feed type specified sets the task as a download or an upload task. For
     * details about the upload and download flows, see Working with Order Feeds in the
     * Selling Integration Guide. Note: The scope depends on the feed type. An error
     * message results when an unsupported scope or feed type is specified. The
     * following list contains this method's authorization scopes and their
     * corresponding feed types: https://api.ebay.com/oauth/api_scope/sell.inventory:
     * See LMS FeedTypes https://api.ebay.com/oauth/api_scope/sell.fulfillment:
     * LMS_ORDER_ACK (specify for upload tasks). Also see LMS FeedTypes
     * https://api.ebay.com/oauth/api_scope/sell.marketing: None*
     * https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly: None* * Reserved
     * for future release.
     *
     * @param CreateTaskRequest $Model description not needed
     *
     * @return mixed
     */
    public function create(CreateTaskRequest $Model)
    {
        return $this->client->request('createTask', 'POST', 'task',
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }

    /**
     * This method downloads the file previously uploaded using uploadFile. Specify the
     * task_id from the uploadFile call. Note: With respect to LMS, this method applies
     * to all feed types except LMS_ORDER_REPORT and LMS_ACTIVE_INVENTORY_REPORT. See
     * LMS API Feeds in the Selling Integration Guide.
     *
     * @param string $task_id the task ID associated with the file to be downloaded
     *
     * @return mixed
     */
    public function getInputFile(string $task_id)
    {
        return $this->client->request('getInputFile', 'GET', "task/{$task_id}/download_input_file",
            [
            ]
        );
    }

    /**
     * This method retrieves the generated file that is associated with the specified
     * task ID. The response of this call is a compressed or uncompressed CSV, XML, or
     * JSON file, with the applicable file extension (for example: csv.gz). For details
     * about how this method is used, see Working with Order Feeds in the Selling
     * Integration Guide. Note: The status of the task to retrieve must be in the
     * COMPLETED or COMPLETED_WITH_ERROR state before this method can retrieve the
     * file. You can use the getTask or getTasks method to retrieve the status of the
     * task.
     *
     * @param string $task_id The ID of the task associated with the file you want to
     *                        download. This ID was generated when the task was created.
     *
     * @return mixed
     */
    public function getResultFile(string $task_id)
    {
        return $this->client->request('getResultFile', 'GET', "task/{$task_id}/download_result_file",
            [
            ]
        );
    }

    /**
     * This method retrieves the details and status of the specified task. The input is
     * task_id. For details of how this method is used, see Working with Order Feeds in
     * the Selling Integration Guide.
     *
     * @param string $task_id The ID of the task. This ID was generated when the task
     *                        was created.
     *
     * @return TaskModel
     */
    public function get(string $task_id): TaskModel
    {
        return $this->client->request('getTask', 'GET', "task/{$task_id}",
            [
            ]
        );
    }

    /**
     * This method associates the specified file with the specified task ID and uploads
     * the input file. After the file has been uploaded, the processing of the file
     * begins. Reports often take time to generate and it's common for this method to
     * return an HTTP status of 202, which indicates the report is being generated. Use
     * the getTask with the task ID or getTasks to determine the status of a report.
     * The status flow is QUEUED &gt; IN_PROCESS &gt; COMPLETED or
     * COMPLETED_WITH_ERROR. When the status is COMPLETED or COMPLETED_WITH_ERROR, this
     * indicates the file has been processed and the order report can be downloaded. If
     * there are errors, they will be indicated in the report file. For details of how
     * this method is used in the upload flow, see Working with Order Feeds in the
     * Selling Integration Guide. Note: This method applies to all File Exchange feed
     * types and LMS feed types except LMS_ORDER_REPORT and
     * LMS_ACTIVE_INVENTORY_REPORT. See LMS API Feeds in the Selling Integration Guide
     * and File Exchange FeedTypes in the File Exchange Migration Guide. Note: You must
     * use a Content-Type header with its value set to &quot;multipart/form-data&quot;.
     * See Samples for information.
     *
     * @param string $task_id The task_id associated with the file that will be
     *                        uploaded. This ID was generated when the specified task was created.
     *
     * @return object
     */
    public function uploadFile(string $task_id): object
    {
        return $this->client->request('uploadFile', 'POST', "task/{$task_id}/upload_file",
            [
            ]
        );
    }
}
