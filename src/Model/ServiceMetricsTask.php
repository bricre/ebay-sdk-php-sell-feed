<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

class ServiceMetricsTask extends AbstractModel
{
    /**
     * The timestamp when the customer service metrics task went into the COMPLETED or
     * COMPLETED_WITH_ERROR state. This field is only returned if the status is one of
     * the two completed values. This state means that eBay has compiled the report for
     * the seller based on the seller&rsquo;s filter criteria, and the seller can run a
     * getResultFile call to download the report.
     *
     * @var string
     */
    public $completionDate = null;

    /**
     * The date the customer service metrics task was created.
     *
     * @var string
     */
    public $creationDate = null;

    /**
     * The relative getCustomerServiceMetricTask call URI path to retrieve the
     * corresponding task.
     *
     * @var string
     */
    public $detailHref = null;

    /**
     * The feed type associated with the task.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * This container shows the criteria set for the report.
     *
     * @var \Ebay\Sell\Feed\Model\CustomerServiceMetricsFilterCriteria
     */
    public $filterCriteria = null;

    /**
     * The schema version number of the file format. If omitted, the default value is
     * used. Default value: 1.0.
     *
     * @var string
     */
    public $schemaVersion = null;

    /**
     * An enumeration value that indicates the state of the task. See FeedStatusEnum
     * for values. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:FeedStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;

    /**
     * The unique eBay-assigned ID of the task.
     *
     * @var string
     */
    public $taskId = null;
}
