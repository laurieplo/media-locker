<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is licensed exclusively to Laurie Plociennik.
 *
 * @copyright   Copyright © 2017 Laurie Plociennik
 * @license     All rights reserved
 * @author      Laurie Plociennik
 */

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
}
