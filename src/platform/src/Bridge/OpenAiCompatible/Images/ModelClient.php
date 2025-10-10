<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible\Images;

use Symfony\AI\Platform\Bridge\OpenAiCompatible\AbstractModelClient;
use Symfony\AI\Platform\Model;
use Symfony\AI\Platform\ModelClientInterface;
use Symfony\AI\Platform\Result\RawResultInterface;

final class ModelClient extends AbstractModelClient implements ModelClientInterface
{
    public function supports(Model $model): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function request(Model $model, array|string $payload, array $options = []): RawResultInterface
    {
        // TODO: Implement request() method.
    }
}
