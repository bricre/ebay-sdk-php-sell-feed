<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

class CreateInventoryTaskRequest extends AbstractModel
{
    /**
     * The schemaVersion/version number of the file format (use the schema version of
     * the API to which you are programming): LMS Version Details / Schema Version File
     * Exchange Schema Version.
     *
     * @var string
     */
    public $schemaVersion = null;

    /**
     * The feed type associated with the inventory task you are about to create. Use a
     * feedType that is available for your API. Presently, only one feed type is
     * available: LMS_ACTIVE_INVENTORY_REPORT.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * The container for the filter fields. This container is used to set the filter
     * criteria for the ActiveInventoryReport. A seller can set date range filters
     * and/or can retrieve listings in a specific state, date, or format.
     *
     * @var \Ebay\Sell\Feed\Model\InventoryFilterCriteria
     */
    public $filterCriteria = null;

    /**
     * The inventory file template used to return specific types of inventory tasks.
     * Presently not applicable for LMS_ACTIVE_INVENTORY_REPORT. For implementation
     * help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:InventoryFileTemplateEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $inventoryFileTemplate = null;
}
