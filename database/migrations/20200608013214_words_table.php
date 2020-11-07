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
            ->addColumn('user_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('user_id', 'users',
                            'id', [
                                'constraint' => 'User has',
                                'delete' => 'CASCADE'
                            ])
            ->create();
    }
}
