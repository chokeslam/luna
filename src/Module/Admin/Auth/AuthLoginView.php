<?php

/**
 * Part of starter project.
 *
 * @copyright      Copyright (C) 2021 LYRASOFT.
 * @license        MIT
 */

declare(strict_types=1);

namespace Lyrasoft\Luna\Module\Admin\Auth;

use Lyrasoft\Luna\Module\Admin\Auth\Form\LoginForm;
use Lyrasoft\Luna\User\UserService;
use Psr\Cache\InvalidArgumentException;
use Windwalker\Core\Application\AppContext;
use Windwalker\Core\Attributes\ViewModel;
use Windwalker\Core\Form\FormFactory;
use Windwalker\Core\Language\TranslatorTrait;
use Windwalker\Core\Router\Navigator;
use Windwalker\Core\Router\RouteUri;
use Windwalker\Core\View\View;
use Windwalker\Core\View\ViewModelInterface;

/**
 * The AuthView class.
 */
#[ViewModel(
    layout: 'login',
    js: 'login.js'
)]
class AuthLoginView implements ViewModelInterface
{
    use TranslatorTrait;

    /**
     * AuthView constructor.
     */
    public function __construct(
        protected UserService $userService,
        protected Navigator $nav,
        protected FormFactory $formFactory,
    ) {
        //
    }

    /**
     * Prepare View.
     *
     * @param  AppContext  $app   The web app context.
     * @param  View        $view  The view object.
     *
     * @return array|RouteUri
     * @throws InvalidArgumentException
     */
    public function prepare(AppContext $app, View $view): array|RouteUri
    {
        if ($this->userService->getUser()->isLogin()) {
            return $this->nav->to('home');
        }

        if ($return = $app->input('return')) {
            $app->getState()->remember('login_return', $return);
        }

        $form = $this->formFactory->create(
            LoginForm::class,
        );

        $view->setTitle($this->trans('luna.login.admin.title'));

        return compact('form');
    }
}
