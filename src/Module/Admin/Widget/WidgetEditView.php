<?php

/**
 * Part of starter project.
 *
 * @copyright  Copyright (C) 2021 LYRASOFT.
 * @license    MIT
 */

declare(strict_types=1);

namespace Lyrasoft\Luna\Module\Admin\Widget;

use Lyrasoft\Luna\Entity\Widget;
use Lyrasoft\Luna\Module\Admin\Widget\Form\EditForm;
use Lyrasoft\Luna\Repository\WidgetRepository;
use Lyrasoft\Luna\Widget\WidgetService;
use Windwalker\Core\Application\AppContext;
use Windwalker\Core\Attributes\ViewModel;
use Windwalker\Core\Form\FormFactory;
use Windwalker\Core\Language\TranslatorTrait;
use Windwalker\Core\Router\Navigator;
use Windwalker\Core\View\View;
use Windwalker\Core\View\ViewModelInterface;
use Windwalker\DI\Attributes\Autowire;
use Windwalker\ORM\ORM;

/**
 * The WidgetEditView class.
 */
#[ViewModel(
    layout: 'widget-edit',
    js: 'widget-edit.js'
)]
class WidgetEditView implements ViewModelInterface
{
    use TranslatorTrait;

    public function __construct(
        protected ORM $orm,
        protected FormFactory $formFactory,
        protected Navigator $nav,
        protected WidgetService $widgetService,
        #[Autowire] protected WidgetRepository $repository
    ) {
    }

    /**
     * Prepare
     *
     * @param  AppContext  $app
     * @param  View        $view
     *
     * @return  mixed
     */
    public function prepare(AppContext $app, View $view): mixed
    {
        $id = $app->input('id');

        /** @var Widget $item */
        $item = $this->repository->getItem($id);
        $type = $item?->getType() ?? $app->input('type');

        $typeClass = $this->widgetService->getWidgetTypeClass($type);
        $widgetInstance = $this->widgetService->createWidgetInstance($type, $item);

        $form = $this->formFactory
            ->create(EditForm::class)
            ->setNamespace('item')
            ->defineFormFields($widgetInstance)
            ->fill(
                $this->repository->getState()->getAndForget('edit.data')
                    ?: $this->orm->extractEntity($item)
            )
            ->fill(compact('type'))
            ->fill(['params' => $item?->getParams()]);

        $this->prepareMetadata($app, $view);

        return compact('form', 'id', 'item', 'typeClass', 'widgetInstance');
    }

    /**
     * Prepare Metadata and HTML Frame.
     *
     * @param  AppContext  $app
     * @param  View        $view
     *
     * @return  void
     */
    protected function prepareMetadata(AppContext $app, View $view): void
    {
        $view->getHtmlFrame()
            ->setTitle(
                $this->trans('unicorn.title.edit', title: $this->trans('luna.widget.title'))
            );
    }
}
