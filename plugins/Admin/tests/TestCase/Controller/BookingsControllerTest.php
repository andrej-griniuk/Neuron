<?php
namespace Admin\Test\TestCase\Controller;

use Admin\Controller\BookingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * Admin\Controller\BookingsController Test Case
 */
class BookingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.admin.bookings',
        'plugin.admin.users',
        'plugin.admin.lessons',
        'plugin.admin.studios',
        'plugin.admin.suburbs',
        'plugin.admin.studio_images',
        'plugin.admin.activities'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test save method
     *
     * @return void
     */
    public function testSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
