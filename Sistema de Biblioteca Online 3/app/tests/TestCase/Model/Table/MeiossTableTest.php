<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MeiossTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MeiossTable Test Case
 */
class MeiossTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MeiossTable
     */
    public $Meioss;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Meioss',
        'app.Users',
        'app.Books',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Meioss') ? [] : ['className' => MeiossTable::class];
        $this->Meioss = TableRegistry::getTableLocator()->get('Meioss', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Meioss);

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
