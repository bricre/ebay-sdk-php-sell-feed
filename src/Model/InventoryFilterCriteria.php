<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The container for the filter fields. This container is used to set the filter
 * criteria for the order report. A seller can set date range filters and/or can
 * retrieve orders in a specific state.
 */
class InventoryFilterCriteria extends AbstractModel
{
    /**
     * The creation date range of the listings you want returned. Set the date range so
     * it contains less than 10 days (maximum). If you do not specify a
     * creationDateRange, results from the last 10 days will be returned in
     * ActiveInventoryReport by default.
     *
     * @var \Ebay\Sell\Feed\Model\DateRange
     */
    public $creationDateRange = null;

    /**
     * The modified date range of the listings you want returned.
     *
     * @var \Ebay\Sell\Feed\Model\DateRange
     */
    public $modifiedDateRange = null;

    /**
     * The type of buying option for the order. Supports LMS_ACTIVE_INVENTORY_REPORT.
     * For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:ListingFormatEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $listingFormat = null;

    /**
     * The status of the listing (whether the listing was unsold or is active). The
     * UNSOLD value does not apply to LMS_ACTIVE_INVENTORY_REPORT feed types. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:ListingStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $listingStatus = null;
}
