<?php

namespace Ebay\Sell\Feed\Api;

use Ebay\Sell\Feed\Model\CreateServiceMetricsTaskRequest as CreateServiceMetricsTaskRequest;
use Ebay\Sell\Feed\Model\CustomerServiceMetricTaskCollection as CustomerServiceMetricTaskCollection;
use Ebay\Sell\Feed\Model\ServiceMetricsTask as ServiceMetricsTask;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class CustomerServiceMetricTask extends AbstractAPI
{
    /**
     * Use this method to return an array of customer service metric tasks. You can
     * limit the tasks returned by specifying a date range. Note: You can pass in
     * either the look_back_days or date_range, but not both.
     *
     * @param array $queries options:
     *                       'date_range'	string	The task creation date range. The results are filtered to
     *                       include only tasks with a creation date that is equal to the dates specified or
     *                       is within the specified range. Do not use with the look_back_days parameter.
     *                       Format: UTC For example, tasks within a range:
     *                       yyyy-MM-ddThh:mm:ss.SSSZ..yyyy-MM-ddThh:mm:ss.SSSZ Tasks created on March 8,
     *                       2020 2020-03-08T00:00.00.000Z..2020-03-09T00:00:00.000Z Maximum: 90 days
     *                       'feed_type'	string	The feed type associated with the task. The only presently
     *                       supported value is CUSTOMER_SERVICE_METRICS_REPORT.
     *                       'limit'	string	The number of customer service metric tasks to return per page of
     *                       the result set. Use this parameter in conjunction with the offset parameter to
     *                       control the pagination of the output. For example, if offset is set to 10 and
     *                       limit is set to 10, the call retrieves tasks 11 thru 20 from the result set. If
     *                       this parameter is omitted, the default value is used. Note:This feature employs
     *                       a zero-based list, where the first item in the list has an offset of 0. Default:
     *                       10 Maximum: 500
     *                       'look_back_days'	string	The number of previous days in which to search for
     *                       tasks. Do not use with the date_range parameter. If both date_range and
     *                       look_back_days are omitted, this parameter's default value is used. Default
     *                       value: 7 Range: 1-90 (inclusive)
     *                       'offset'	string	The number of customer service metric tasks to skip in the
     *                       result set before returning the first task in the paginated response. Combine
     *                       offset with the limit query parameter to control the items returned in the
     *                       response. For example, if you supply an offset of 0 and a limit of 10, the first
     *                       page of the response contains the first 10 items from the complete list of items
     *                       retrieved by the call. If offset is 10 and limit is 20, the first page of the
     *                       response contains items 11-30 from the complete result set. Default: 0
     *
     * @return CustomerServiceMetricTaskCollection
     */
    public function gets(array $queries = []): CustomerServiceMetricTaskCollection
    {
        return $this->client->request('getCustomerServiceMetricTasks', 'GET', 'customer_service_metric_task',
            [
                'query' => $queries,
            ]
        );
    }

    /**
     * Use this method to create a customer service metrics download task with filter
     * criteria for the customer service metrics report. When using this method,
     * specify the feedType and filterCriteria including both evaluationMarketplaceId
     * and customerServiceMetricType for the report. The method returns the location
     * response header containing the call URI to use with getCustomerServiceMetricTask
     * to retrieve status and details on the task. Only CURRENT Customer Service
     * Metrics reports can be generated with the Sell Feed API. PROJECTED reports are
     * not supported at this time. See the getCustomerServiceMetric method document in
     * the Analytics API for more information about these two types of reports. Note:
     * Before calling this API, retrieve the summary of the seller's performance and
     * rating for the customer service metric by calling getCustomerServiceMetric (part
     * of the Analytics API). You can then populate the create task request fields with
     * the values from the response. This technique eliminates failed tasks that
     * request a report for a customerServiceMetricType and evaluationMarketplaceId
     * that are without evaluation.
     *
     * @param CreateServiceMetricsTaskRequest $Model request payload containing
     *                                               version, feedType, and optional filterCriteria
     *
     * @return mixed
     */
    public function create(CreateServiceMetricsTaskRequest $Model)
    {
        return $this->client->request('createCustomerServiceMetricTask', 'POST', 'customer_service_metric_task',
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }

    /**
     * Use this method to retrieve customer service metric task details for the
     * specified task. The input is task_id.
     *
     * @param string $task_id use this path parameter to specify the task ID value for
     *                        the customer service metric task to retrieve
     *
     * @return ServiceMetricsTask
     */
    public function get(string $task_id): ServiceMetricsTask
    {
        return $this->client->request('getCustomerServiceMetricTask', 'GET', "customer_service_metric_task/{$task_id}",
            [
            ]
        );
    }
}
