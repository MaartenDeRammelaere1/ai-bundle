<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible;

use Symfony\AI\Platform\ModelCatalog\DynamicModelCatalog;

final class ModelCatalog extends DynamicModelCatalog
{
    // Custom OpenAi compatible models can provide access to many different models from various providers
    // Models are dynamically available and identified by provider/model format
}
