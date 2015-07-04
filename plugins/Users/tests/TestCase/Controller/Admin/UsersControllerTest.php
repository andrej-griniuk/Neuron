<?php
namespace Users\Test\TestCase\Controller\Admin;

use Cake\TestSuite\IntegrationTestCase;
use Users\Controller\Admin\UsersController;

/**
 * Users\Controller\Admin\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.users.users'
    ];

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
