<?php

use Phinx\Migration\AbstractMigration;

class WordsTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('words',
                              ['collation' => 'utf8mb4_general_ci']);
        $table->addColumn('word','string')
            ->addColumn('picture', 'string')
            ->addColumn('typeof', 'string')
            ->addColumn('views', 'biginteger')
            ->addColumn('workspace_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('workspace_id', 'workspaces', 'id', ['delete' => 'CASCADE'])
            ->create();
    }
}
