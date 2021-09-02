<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for the order filters.
 */
class OrderFilterCriteria extends AbstractModel
{
    /**
     * The creation date range of the orders you want returned. Set the date range so
     * it contains less than 10 days (maximum). If you do not specify a DateRange,
     * results from the last 10 days will be returned by default.
     *
     * @var \Ebay\Sell\Feed\Model\DateRange
     */
    public $creationDateRange = null;

    /**
     * The modified date range of the orders you want returned. Note: This container is
     * for future use. At this time, the createOrderTask method only supports order
     * creation date filters and not modified order date filters.
     *
     * @var \Ebay\Sell\Feed\Model\DateRange
     */
    public $modifiedDateRange = null;

    /**
     * The order status of the orders returned. If the filter is omitted from
     * createOrderTask call, orders that are in both ACTIVE and COMPLETED states are
     * returned. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/feed/types/api:OrderStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $orderStatus = null;
}
