<?php

namespace Tequilarapido\SimpleWidget\Test\Dummy;

use Tequilarapido\SimpleWidget\Widget;

class DummyRestrictedWidget extends Widget
{
    private $authorized;

    public function __construct($authorized = false)
    {
        $this->authorized = $authorized;
    }

    public function authorize()
    {
        return $this->authorized;
    }

    public function content()
    {
        return 'DummyRestrictedContent';
    }
}
