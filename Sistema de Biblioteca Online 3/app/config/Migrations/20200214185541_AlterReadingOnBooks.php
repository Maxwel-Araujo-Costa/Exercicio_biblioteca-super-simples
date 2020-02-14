<?php

use Migrations\AbstractMigration;

class AlterReadingOnBooks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('books');
        $table->changeColumn('reading', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex([
            'reading',
        ], [
            'name' => 'BY_READING',
            'unique' => false,
        ]);
        $table->update();
    }
}
