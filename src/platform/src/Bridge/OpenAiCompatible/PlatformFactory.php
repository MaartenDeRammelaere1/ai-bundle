<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible;

use Symfony\AI\Platform\Contract;
use Symfony\AI\Platform\Platform;
use Symfony\Component\HttpClient\EventSourceHttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final readonly class PlatformFactory
{
    public static function create(
        #[\SensitiveParameter] string $apiKey,
        string $baseUrl,
        ?HttpClientInterface $httpClient = null,
        ?Contract $contract = null,
    ): Platform {
        $httpClient = $httpClient instanceof EventSourceHttpClient ? $httpClient : new EventSourceHttpClient($httpClient);

        return new Platform(
            [
                new Audio\ModelClient($httpClient, $apiKey, $baseUrl),
                new Completions\ModelClient($httpClient, $apiKey, $baseUrl),
                new Embeddings\ModelClient($httpClient, $apiKey, $baseUrl),
                new Images\ModelClient($httpClient, $apiKey, $baseUrl),
                new PassThrough\ModelClient($httpClient, $apiKey, $baseUrl),
            ],
            [
                // TODO: check to use openai result converters
                new Audio\ResultConverter(),
                new Completions\ResultConverter(),
                new Embeddings\ResultConverter(),
                new Images\ResultConverter(),
                new PassThrough\ResultConverter(),
            ],
            new ModelCatalog(),
            $contract ?? Contract::create(
                //TODO: add normalizers
        ),
        );
    }
}
