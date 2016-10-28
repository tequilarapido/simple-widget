<?php

namespace Tequilarapido\SimpleWidget;

interface WidgetInterface
{
    /**
     * Whether or not user is authorized to view widget content.
     *
     * @return bool
     */
    public function authorize();

    /**
     * String or content to display when the widget is not authorized.
     *
     * @return string
     */
    public function notAuthorizedContent();

    /**
     * render out the result of the content() method.
     *
     * @return mixed
     */
    public function render();
}
