<?php

declare(strict_types=1);

namespace App\Migration;

use Spiral\Migrations\Migration as BaseMigration;

abstract class Migration extends BaseMigration
{
    /**
     * Fixing postgres sequence after insert
     *
     * @param string $table
     * @param string $column
     */
    public function fixSequence($table, $column)
    {
        // ex. user_id_seq
        $seq = $table . '_' . $column . '_seq';

        // ex. SELECT setval('user_id_seq', (SELECT MAX("id") FROM "user"))
        $this->database()->execute('SELECT setval(\'' . $seq . '\', (SELECT MAX("' . $column . '") FROM "' . $table . '"))');
    }

    public function fixIdSequence($table)
    {
        $this->fixSequence($table, 'id');
    }
}
