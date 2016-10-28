<?php

namespace Tequilarapido\SimpleWidget;

use Illuminate\View\View;
use Tequilarapido\SimpleWidget\Contract\Widget as WidgetContract;

abstract class Widget implements WidgetContract
{
    /**
     * Whether or not user is authorized to view widget content.
     *
     * Widget child is authorized by default.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * String or content to display when the widget is not authorized.
     *
     * @return string
     */
    public function notAuthorizedContent()
    {
        return '<!-- Not authorized. -->';
    }

    /**
     * Method to echo out the widget result.
     *
     * @return mixed
     */
    public function render()
    {
        if (! $this->authorize()) {
            return $this->notAuthorizedContent();
        }

        $content = $this->content();

        return $content instanceof View ? $content->render() : $content;
    }

    /**
     * Generate widget content.
     *
     * @return mixed
     */
    abstract protected function content();
}
