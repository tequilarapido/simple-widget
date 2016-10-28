<?php

namespace Tequilarapido\SimpleWidget\Test;

use Tequilarapido\SimpleWidget\Contract\Widget as WidgetContact;
use Tequilarapido\SimpleWidget\Test\Dummy\DummyContentWidget;
use Tequilarapido\SimpleWidget\Test\Dummy\DummyRestrictedWidget;
use Tequilarapido\SimpleWidget\Test\Dummy\DummyViewWidget;

class WidgetTest extends TestCase
{
    /** @test */
    public function it_respects_contract()
    {
        $this->assertInstanceOf(WidgetContact::class, new DummyContentWidget);
    }

    /** @test */
    public function it_autorize_by_default()
    {
        $this->assertNotEquals('<!-- Not authorized. -->', (new DummyContentWidget)->render());
    }

    /** @test */
    public function it_returns_not_authorized_content_if_not_authorized_on_restricted_widget()
    {
        $this->assertEquals('<!-- Not authorized. -->', (new DummyRestrictedWidget)->render());
    }

    /** @test */
    public function it_returns_content_if_authorized_on_restricted_widget()
    {
        $this->assertEquals('DummyRestrictedContent', (new DummyRestrictedWidget(true))->render());
    }

    /** @test */
    public function it_returns_view_content()
    {
        $this->assertEquals(
            '<p>Dummy view content.</p>',
            $this->helper->stripWhiteSpacesFromHtml((new DummyViewWidget)->render())
        );
    }

    /** @test */
    public function it_returns_view_content_when_included_in_another_view()
    {
        $this->assertEquals(
            '<p>Before</p><p>Dummy view content.</p><p>After</p>',
            $this->helper->stripWhiteSpacesFromHtml(view('a_dummy_parent_view')->render())
        );
    }
}
