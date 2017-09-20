<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TaskTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TaskTypesTable Test Case
 */
class TaskTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TaskTypesTable
     */
    public $TaskTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.task_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TaskTypes') ? [] : ['className' => TaskTypesTable::class];
        $this->TaskTypes = TableRegistry::get('TaskTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TaskTypes);

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
}
