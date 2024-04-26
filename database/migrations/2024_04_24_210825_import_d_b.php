<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

return new class extends Migration
{ 

     /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        // Drop all tables
        $this->dropAllTables();

        // Rebuild tables using SQL file
        $this->rebuildTables();
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        // Dropping all tables in a down migration is not recommended,
        // as it could result in loss of data. 
        // You may implement the reverse of your rebuild logic here
    }

    /**
     * Drop all tables in the database.
     *
     * @return void
     */
    protected function dropAllTables()
    {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $table = (array) $table;
            DB::statement('DROP TABLE `' . $table['Tables_in_' . env('DB_DATABASE')] . '`');
        }
    }

    /**
     * Rebuild tables using SQL file.
     *
     * @return void
     */
    protected function rebuildTables()
    {
        $sqlFilePath = public_path('structure.sql');
        $sql = File::get($sqlFilePath);
        DB::unprepared($sql);
    }
   
};
