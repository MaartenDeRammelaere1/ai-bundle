<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible\Audio;

use Symfony\AI\Platform\Bridge\OpenAiCompatible\AbstractModelClient;
use Symfony\AI\Platform\Model;
use Symfony\AI\Platform\ModelClientInterface;
use Symfony\AI\Platform\Result\RawResultInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ModelClient extends AbstractModelClient implements ModelClientInterface
{
    public function __construct(
        private HttpClientInterface $httpClient,
        #[\SensitiveParameter] private string $apiKey,
        private string $baseUrl,
    ) {
    }

    public function supports(Model $model): bool
    {
        return true;
    }

    public function request(Model $model, array|string $payload, array $options = []): RawResultInterface
    {
        // TODO: Implement request() method.
    }
}
