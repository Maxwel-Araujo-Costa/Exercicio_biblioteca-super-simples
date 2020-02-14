<?php

use Migrations\AbstractMigration;

class CreateMeios extends AbstractMigration
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
        $table = $this->table('meios');

        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);
        $table->addIndex([
            'user_id',
        ], [
            'name' => 'BY_USER_ID',
            'unique' => false,
        ]);

        $table->addColumn('book_id', 'integer', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }
}
