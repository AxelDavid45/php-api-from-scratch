<?php

use Phinx\Migration\AbstractMigration;

class MeaningsTable extends AbstractMigration
{

    public function change()
    {
        $table = $this->table('meanings',
                              ['collation' => 'utf8mb4_general_ci',]);
        $table->addColumn('meaning', 'text')
            ->addColumn('word_id', 'integer')
            ->addForeignKey('word_id', 'words',
                            'id', ['delete' => 'CASCADE'])
            ->create();

    }
}
