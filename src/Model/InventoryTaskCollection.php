<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

class InventoryTaskCollection extends AbstractModel
{
    /**
     * The path to the call URI that produced the current page of results.
     *
     * @var string
     */
    public $href = null;

    /**
     * The value of the limit parameter submitted in the request, which is the maximum
     * number of inventory tasks to return per page, from the result set. A result set
     * is the complete set of tasks returned by the method. Note: Though this parameter
     * is not required to be submitted in the request, the parameter defaults to 10 if
     * omitted. Additionally, if this is the last or only page of the result set, the
     * page may contain fewer tasks than the limit value submitted in the request. To
     * determine the number of pages in a result set, divide the total value (total
     * number of tasks matching the input criteria) by this limit value, and then round
     * up to the next integer. For example, if the total value was 120 (120 total
     * tasks) and the limit value was 50 (show 50 tasks per page), the total number of
     * pages in the result set is three, so the seller would have to make three
     * separate getInventoryTasks calls to view all tasks matching the input criteria.
     *
     * @var int
     */
    public $limit = null;

    /**
     * The path to the call URI for the next page of results. This value is returned if
     * there is an additional page of results to return from the result set.
     *
     * @var string
     */
    public $next = null;

    /**
     * The number of results skipped in the result set before listing the first
     * returned result. This value can be specified in the request with the offset
     * query parameter. Note: The items in a paginated result set use a zero-based
     * list, where the first item in the list has an offset of 0.
     *
     * @var int
     */
    public $offset = null;

    /**
     * The path to the call URI for the previous page of results. This is returned if
     * there is a previous page of results from the result set.
     *
     * @var string
     */
    public $prev = null;

    /**
     * An array of the inventory tasks on this page. The tasks are sorted by creation
     * date. Note: An empty array is returned if the filter criteria excludes all
     * tasks.
     *
     * @var \Ebay\Sell\Feed\Model\InventoryTask[]
     */
    public $tasks = null;

    /**
     * The total number of inventory tasks that match the input criteria.
     *
     * @var int
     */
    public $total = null;
}