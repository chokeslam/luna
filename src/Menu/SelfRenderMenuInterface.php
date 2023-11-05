<?php

namespace Lyrasoft\Luna\Menu;

use Lyrasoft\Luna\Menu\Tree\DbMenuNode;

/**
 * Interface SeldRenderMenuInterface
 *
 * @since  1.7
 */
interface SelfRenderMenuInterface extends LayoutRenderedMenuInterface
{
    /**
     * render
     *
     * @param  DbMenuNode  $menu
     * @param  array       $variables
     * @param  array       $params
     *
     * @return  string
     *
     * @since  1.7
     */
    public function render(DbMenuNode $menu, array $variables, array $params): string;
}
