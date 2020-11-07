<?php

use Phinx\Migration\AbstractMigration;

class SynomymsTable extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('synonyms',
                              ['collation' => 'utf8mb4_general_ci',]);
        $table->addColumn('synonym', 'string')
            ->addColumn('word_id', 'integer')
            ->addTimestamps()
            ->addForeignKey('word_id', 'words',
                            'id', ['delete' => 'CASCADE'])
            ->create();

    }
}
