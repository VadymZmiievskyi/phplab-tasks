<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider negativeDataProvider
     * @param array $input
     */
    public function testNegative(...$input)
    {
        $this->expectException(InvalidArgumentException::class);

        countArgumentsWrapper($input);
    }

    public function negativeDataProvider()
    {
        return [
            [1, 5, 10],
            ['Hello', [1, 22, 22]],
            [],
        ];
    }
}