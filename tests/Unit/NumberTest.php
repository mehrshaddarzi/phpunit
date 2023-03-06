<?php

namespace Unit;

class NumberTest extends \PHPUnit\Framework\TestCase
{

    public static function setUpBeforeClass(): void
    {
        echo 'run before start PHP unit Class' . "\n";
        # require_once '../../src/Numeric.php'; {For static include file}
    }

    public static function tearDownAfterClass(): void
    {
        echo 'After run last' . "\n";
    }

    public function testSumMethod()
    {
        $class = new \Numeric();
        $this->assertTrue(
            method_exists($class, 'sum'),
            'Class does not have method myFunction'
        );
    }

    public function testSameNumeric()
    {
        $numeric = 1;

        // @see: https://docs.phpunit.de/en/10.0/assertions.html#
        $this->assertIsInt($numeric);
        $this->assertSame(1, $numeric);
    }

    public function testLoopSumArray()
    {
        $array = [
            [1, 2],
            [4, 5]
        ];
        foreach ($array as $item) {

            // Is Array
            $this->assertIsArray($item);

            // Array Count
            $this->assertCount(2, $item);

            // Sum
            $this->assertGreaterThan(2, ($item[0] + $item[1]));
        }
    }

    /**
     * @dataProvider provideTrimData
     * @see https://blog.martinhujer.cz/how-to-use-data-providers-in-phpunit/
     */
    public function testValidateInput($expectedResult, $input)
    {
        $this->assertSame($expectedResult, $input);
    }

    public static function provideTrimData(): array
    {
        return [
            [
                'Hello World',
                ' Hello World',
            ],
            [
                'Hello World',
                " Hello World \n",
            ],
        ];
    }

}