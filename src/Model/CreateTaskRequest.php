<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * The type that defines the fields for the createTask method.
 */
class CreateTaskRequest extends AbstractModel
{
    /**
     * The feed type associated with the task. Only use a feedType that is available
     * for your API. Available feed types: LMS FeedTypes: All LMS feed types except
     * LMS_ORDER_REPORT and LMS_ACTIVE_INVENTORY_REPORT File Exchange FeedTypes.
     *
     * @var string
     */
    public $feedType = null;

    /**
     * The schemaVersion/version number of the file format (use the schema version of
     * the API to which you are programming): LMS Version Details / Schema Version File
     * Exchange Schema Version.
     *
     * @var string
     */
    public $schemaVersion = null;
}
