<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for the createOrderTask request.
 */
class CreateOrderTaskRequest extends AbstractModel
{
    /**
     * The feed type associated with the task. The only presently supported value is
     * LMS_ORDER_REPORT.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * The container for the filter fields. This container is used to set the filter
     * criteria for the order report. A seller can set date range filters and/or can
     * retrieve orders in a specific state.
     *
     * @var \Ebay\Sell\Feed\Model\OrderFilterCriteria
     */
    public $filterCriteria = null;

    /**
     * The schema version of the LMS OrderReport. For the LMS_ORDER_REPORT feed type,
     * see the OrderReport reference page to see the present schema version. The
     * schemaVersion value is the version number shown at the top of the OrderReport
     * page. Restriction: This value must be 1113 or higher. The OrderReport schema
     * version is updated about every two weeks. All version numbers are odd numbers
     * (even numbers are skipped). For example, the next release version after '1113'
     * is '1115'.
     *
     * @var string
     */
    public $schemaVersion = null;
}
