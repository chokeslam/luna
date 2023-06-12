<?php

/**
 * Part of datavideo project.
 *
 * @copyright  Copyright (C) 2021 LYRASOFT.
 * @license    MIT
 */

declare(strict_types=1);

namespace Lyrasoft\Luna\Field;

use Lyrasoft\Luna\Entity\Article;
use Unicorn\Field\ModalField;

/**
 * The UserModalField class.
 */
class ArticleModalField extends ModalField
{
    protected function configure(): void
    {
        $this->route('article_list');
        $this->table(Article::class);
    }

    protected function getItemTitle(): ?string
    {
        return $this->getItem()['title'] ?? '';
    }
}
