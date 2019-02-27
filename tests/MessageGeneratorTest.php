<?php
/**
 * Created by PhpStorm.
 * User: srogacki
 * Date: 25.02.2019
 * Time: 16:10
 */

declare(strict_types=1);

namespace Acme\ContaoHelloWorldBundle\Tests;

use Acme\ContaoHelloWorldBundle\Library\MessageGenerator;
use PHPUnit\Framework\TestCase;

class MessageGeneratorTest extends TestCase
{
    public function testCanSayHelloWorld()
    {
        $messageGenerator = new MessageGenerator();

        $message = $messageGenerator->sayHelloTo('World');

        $this->assertSame('Hello World', $message);
    }
    public function testCanNotSayHelloToEmptyTarget(){

        $messageGenerator = new MessageGenerator();

        $this->expectException(\InvalidArgumentException::class);

        $message = $messageGenerator->sayHelloTo('');
    }
}
