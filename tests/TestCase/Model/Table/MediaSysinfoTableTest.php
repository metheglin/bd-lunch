<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediaSysinfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediaSysinfoTable Test Case
 */
class MediaSysinfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediaSysinfoTable
     */
    public $MediaSysinfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.media_sysinfo',
        'app.media_requests',
        'app.companies',
        'app.tasks',
        'app.task_types',
        'app.users',
        'app.roles',
        'app.tasks_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MediaSysinfo') ? [] : ['className' => MediaSysinfoTable::class];
        $this->MediaSysinfo = TableRegistry::get('MediaSysinfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MediaSysinfo);

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
