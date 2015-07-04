<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\NearbyStudiosCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\NearbyStudiosCell Test Case
 */
class NearbyStudiosCellTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMock('Cake\Network\Request');
        $this->response = $this->getMock('Cake\Network\Response');
        $this->NearbyStudios = new NearbyStudiosCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NearbyStudios);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
