<?php

namespace Tests\Unit;

use App\Http\Controllers\TestController;
use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_big_calculation(): void
    {
        $controller = new TestController();
        $this->assertSame(5, $controller->bigCalculation(3,2));

    }

    public function test_false_big_calculation(): void
    {
        $controller = new TestController();

        $bool = $controller->bigCalculation(33,22) === 50;
        $this->assertFalse($bool);
    }
}
