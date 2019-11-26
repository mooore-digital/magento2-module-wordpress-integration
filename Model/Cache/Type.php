<?php

declare(strict_types=1);

namespace Mooore\WordpressIntegration\Model\Cache;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class Type extends TagScope
{
    const TYPE_IDENTIFIER = 'wordpress_integration';
    const CACHE_TAG = 'WORDPRESS_INTEGRATION';

    public function __construct(FrontendPool $cacheFrontendPool)
    {
        parent::__construct($cacheFrontendPool->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
