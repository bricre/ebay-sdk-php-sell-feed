<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for a date range.
 */
class DateRange extends AbstractModel
{
    /**
     * The beginning date in the range. If the parent type is included, both the from
     * and/or the to fields become conditionally required. Format: UTC
     * yyyy-MM-ddThh:mm:ss.SSSZ For example: Tasks within a range
     * yyyy-MM-ddThh:mm:ss.SSSZ..yyyy-MM-ddThh:mm:ss.SSSZ Tasks created on March 31,
     * 2021 2021-03-31T00:00:00.000Z..2021-03-31T00:00:00.000Z.
     *
     * @var string
     */
    public $from = null;

    /**
     * The end date for the date range, which is inclusive. If the parent type is
     * included, both the from and/or the to fields become conditionally required. For
     * example: Tasks within a range yyyy-MM-ddThh:mm:ss.SSSZ..yyyy-MM-ddThh:mm:ss.SSSZ
     * Tasks created on March 31, 2021
     * 2021-03-31T00:00:00.000Z..2021-03-31T00:00:00.000Z.
     *
     * @var string
     */
    public $to = null;
}
