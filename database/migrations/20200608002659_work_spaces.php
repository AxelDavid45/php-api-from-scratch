<?php

use Phinx\Migration\AbstractMigration;

class WorkSpaces extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('workspaces', ['collation' => 'utf8mb4_general_ci']);
        $table->addColumn('name', 'string', ['limit' => 60])
            ->addColumn('user_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users',
                            'id', ['delete' => 'CASCADE'])
            ->create();

    }
}
