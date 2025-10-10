<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible\Completions;

use Symfony\AI\Platform\Model;
use Symfony\AI\Platform\Result\RawResultInterface;
use Symfony\AI\Platform\Result\ResultInterface;
use Symfony\AI\Platform\Result\TextResult;
use Symfony\AI\Platform\ResultConverterInterface;

final readonly class ResultConverter implements ResultConverterInterface
{
    public function supports(Model $model): bool
    {
        return true;
    }

    public function convert(RawResultInterface $result, array $options = []): ResultInterface
    {
        $data = $result->getData();

        if (isset($data['choices'][0]['message']['content'])) {
            return new TextResult($data['choices'][0]['message']['content']);
        }

        if (isset($data['text'])) {
            return new TextResult($data['text']);
        }

        return new TextResult('No response content found');
    }
}
