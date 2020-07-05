<?php

use Phinx\Migration\AbstractMigration;

class ExamplesTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table(
            'examples',
            ['collation' => 'utf8mb4_general_ci']
        );
        $table->addColumn('example', 'text')
            ->addColumn('word_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('word_id', 'words',
                            'id',
                            [
                                'constraint' => 'Many exaples can be for a word',
                                'delete' => 'CASCADE'
                            ])
            ->create();
    }
}
