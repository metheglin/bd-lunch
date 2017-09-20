<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediaRequestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediaRequestsTable Test Case
 */
class MediaRequestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediaRequestsTable
     */
    public $MediaRequests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.media_requests',
        'app.companies',
        'app.media_sysinfo',
        'app.tasks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MediaRequests') ? [] : ['className' => MediaRequestsTable::class];
        $this->MediaRequests = TableRegistry::get('MediaRequests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MediaRequests);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
