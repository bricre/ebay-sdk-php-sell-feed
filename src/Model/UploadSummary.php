<?php

namespace Ebay\Sell\Feed\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * This container provides summary information on an upload feed (not applicable
 * for download feed types).
 */
class UploadSummary extends AbstractModel
{
    /**
     * The number of records, such as the number of listings created or the number of
     * pictures uploaded to a listing, that failed to process during the upload feed.
     * Check the response file and correct any issues mentioned. If the feed fails
     * before processing, no response file is provided. In this case check the REST
     * output response.
     *
     * @var int
     */
    public $failureCount = null;

    /**
     * The number of records that were successfully processed during the upload feed.
     *
     * @var int
     */
    public $successCount = null;
}
