<?php

namespace Tequilarapido\SimpleWidget\Test\Dummy;

use Tequilarapido\SimpleWidget\Widget;

class DummyViewWidget extends Widget
{
    public function content()
    {
        return view('dummy');
    }
}
