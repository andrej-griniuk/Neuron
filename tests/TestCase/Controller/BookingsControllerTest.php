<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BookingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BookingsController Test Case
 */
class BookingsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookings',
        'app.users',
        'app.lessons',
        'app.studios',
        'app.suburbs',
        'app.activities'
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
