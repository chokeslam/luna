<?php
/**
 * Part of earth project.
 *
 * @copyright  Copyright (C) 2019 .
 * @license    LGPL-2.0-or-later
 */

namespace Lyrasoft\Luna\Menu;

use Windwalker\Core\Renderer\RendererService;
use Windwalker\DI\Attributes\Inject;

/**
 * The SelfRenderMenuTrait class.
 *
 * @since  1.7
 */
trait SelfRenderMenuTrait
{
    #[Inject]
    protected RendererService $rendererService;

    /**
     * render
     *
     * @param MenuNode $menu
     * @param array    $variables
     * @param array    $params
     *
     * @return  string
     *
     * @since  1.7
     */
    public function render(MenuNode $menu, array $variables, array $params): string
    {
        $viewInstance = $this;

        return $this->rendererService->render(
            $this->getLayout($variables, $params),
            compact('variables', 'params', 'menu', 'viewInstance'),
        );
    }
}