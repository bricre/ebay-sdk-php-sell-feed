<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

class InventoryTask extends AbstractModel
{
    /**
     * The ID of the task. This ID is generated when the task was created by the
     * createInventoryTask method.
     *
     * @var string
     */
    public $taskId = null;

    /**
     * The status of the task. Users must wait until status is complete before moving
     * on to the next step (such as uploading/downloading a file). For implementation
     * help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:FeedStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;

    /**
     * The feed type associated with the inventory task.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * The date the task was created.
     *
     * @var string
     */
    public $creationDate = null;

    /**
     * The timestamp when the task status went into the COMPLETED,
     * COMPLETED_WITH_ERROR, or PARTIALLY_PROCESSED state. This field is only returned
     * if the status is one of the three completed values.
     *
     * @var string
     */
    public $completionDate = null;

    /**
     * The schema version number associated with the task.
     *
     * @var string
     */
    public $schemaVersion = null;

    /**
     * The path to the call URI used to retrieve the task. This field points to the
     * getInventoryTask URI.
     *
     * @var string
     */
    public $detailHref = null;

    /**
     * This container provides summary information on an upload feed (not applicable
     * for download feed types).
     *
     * @var \Ebay\Sell\Feed\Model\UploadSummary
     */
    public $uploadSummary = null;

    /**
     * This container is used to set the filter criteria for the ActiveInventoryReport.
     * A seller can set date range filters and/or can retrieve listings in a specific
     * state, date, or format.
     *
     * @var \Ebay\Sell\Feed\Model\InventoryFilterCriteria
     */
    public $filterCriteria = null;

    /**
     * The inventory file template used to return specific types of inventory tasks, if
     * set in the createInventoryTask method. This field does not apply to
     * LMS_ACTIVE_INVENTORY_REPORT feed types. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:InventoryFileTemplateEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $inventoryFileTemplate = null;
}
