<?php

use Phinx\Migration\AbstractMigration;

class UserWorkspaces extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('user_workspaces',
                              ['collation' => 'utf8mb4_general_ci',
                               'id' => false,
                               'primary_key' => ['user_id', 'workspace_id']
                              ]);

        $table->addColumn('user_id', 'integer')
            ->addColumn('workspace_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users',
                            'id', ['delete' => 'CASCADE'])
            ->addForeignKey('workspace_id', 'workspaces',
                            'id', ['delete' => 'CASCADE'])
            ->create();

    }
}
