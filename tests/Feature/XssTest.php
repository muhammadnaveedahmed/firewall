<?php

namespace Akaunting\Firewall\Tests\Feature;

use Akaunting\Firewall\Middleware\Xss;
use Akaunting\Firewall\Tests\TestCase;

class XssTest extends TestCase
{
    public function testShouldPass()
    {
        $this->assertEquals('next', (new Xss())->handle($this->request, $this->getNextClosure()));
    }

    public function testShouldFail()
    {
        $this->request->request->set('foo', '<script>alert(123)</script>');

        $this->assertNotEquals('next', (new Xss())->handle($this->request, $this->getNextClosure()));
    }
}
