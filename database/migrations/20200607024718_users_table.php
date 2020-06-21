<?php

use Phinx\Migration\AbstractMigration;

class UsersTable extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('users', ['collation' => 'utf8mb4_general_ci']);
        $table->addColumn('name', 'string', ['limit' => 60])
            ->addColumn('email', 'string', ['limit' => 50])
            ->addColumn('birthday', 'date')
            ->addColumn('token', 'text')
            ->addTimestamps()
            ->addIndex('email', ['unique' => true])
            ->create();
    }
}
