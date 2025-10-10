<?php
declare(strict_types=1);

namespace Symfony\AI\Platform\Bridge\OpenAiCompatible;

enum Task: string
{
    case Completion = 'completion';
    case Embeddings = 'embedding';
    case ImagesGeneration = 'images-generation';
    case ImagesEdits = 'images-edits';
    case Audio = 'audio';
    case PassTrough = 'pass-through';
}
