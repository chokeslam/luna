{{-- Part of Luna project. --}}
<?php
/**
 * Global variables
 * --------------------------------------------------------------
 * @var $app      \Windwalker\Web\Application                 Global Application
 * @var $package  \Lyrasoft\Luna\LunaPackage                 Package object.
 * @var $view     \Lyrasoft\Luna\Admin\View\Page\PageHtmlView    View object.
 * @var $uri      \Windwalker\Uri\UriData                     Uri information, example: $uri->path
 * @var $chronos  \Windwalker\Core\DateTime\DateTime          PHP DateTime object of current time.
 * @var $helper   \Windwalker\Core\View\Helper\Set\HelperSet  The Windwalker HelperSet object.
 * @var $router   \Windwalker\Core\Router\MainRouter          Route builder object.
 * @var $asset    \Windwalker\Core\Asset\AssetManager         The Asset manager.
 */
?>

<div class="btn-group phoenix-btn-save-dropdown">
    <button type="button" class="btn btn-success btn-sm btn-wide phoenix-btn-save"
        onclick="Phoenix.post();">
        <span class="fa fa-save"></span>
        @lang('phoenix.toolbar.save')
    </button>
    <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>

    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a class="dropdown-item phoenix-btn-save2copy"
                href="#"
                onclick="Phoenix.post(null, {task: 'save2copy'});">
                <span class="fa fa-fw fa-copy text-info"></span>
                @lang('phoenix.toolbar.save2copy')
            </a>
        </li>

        <li>
            <a class="dropdown-item phoenix-btn-save2new"
                href="#"
                onclick="Phoenix.post(null, {task: 'save2new'});">
                <span class="fa fa-fw fa-plus text-primary"></span>
                @lang('phoenix.toolbar.save2new')
            </a>
        </li>
    </ul>
</div>

<button type="button" class="btn  btn-primary btn-sm phoenix-btn-save2close"
    onclick="Phoenix.post(null, {task: 'save2close'});">
    <span class="fa fa-check"></span>
    @lang('phoenix.toolbar.save2close')
</button>

<a role="button" class="btn btn-default btn-outline-secondary btn-sm phoenix-btn-cancel"
    href="{{ $router->route('pages') }}">
    <span class="fa fa-remove fa-times"></span>
    @lang('phoenix.toolbar.cancel')
</a>

<button type="button" class="btn btn-primary btn-sm ml-auto luna-button-options"
    data-toggle="modal" data-target="#options-modal">
    <span class="fa fa-cog"></span>
    @lang('luna.page.button.options')
</button>

@if ($item->id)
    <a href="{{ $router->route('front@page', ['path' => $item->alias, 'preview' => $item->preview_secret]) }}"
        target="_blank"
        class="btn btn-sm btn-outline-primary">
        <span class="fa fa-eye"></span>
        @lang('luna.page.button.preview')
    </a>
@endif
