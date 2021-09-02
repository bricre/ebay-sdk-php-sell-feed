<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for the task details.
 */
class Task extends AbstractModel
{
    /**
     * The timestamp when the task went into the COMPLETED or COMPLETED_WITH_ERROR
     * state. This state means that eBay has compiled the report for the seller based
     * on the seller&rsquo;s filter criteria, and the seller can run a getResultFile
     * call to download the report.
     *
     * @var string
     */
    public $completionDate = null;

    /**
     * The date the task was created.
     *
     * @var string
     */
    public $creationDate = null;

    /**
     * The path to the call URI used to retrieve the task. This field points to the
     * GetOrderTask URI if the task is for LMS_ORDER_REPORT or will be null if this
     * task is for LMS_ORDER_ACK.
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
     * The schema version number associated with the task.
     *
     * @var string
     */
    public $schemaVersion = null;

    /**
     * The enumeration value that indicates the state of the task that was submitted in
     * the request. See FeedStatusEnum for information. The values COMPLETED and
     * COMPLETED_WITH_ERROR indicate the Order Report file is ready to download. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:FeedStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;

    /**
     * The ID of the task that was submitted in the request.
     *
     * @var string
     */
    public $taskId = null;

    /**
     * This container provides summary information on an upload feed (not applicable
     * for download feed types).
     *
     * @var \Ebay\Sell\Feed\Model\UploadSummary
     */
    public $uploadSummary = null;
}
