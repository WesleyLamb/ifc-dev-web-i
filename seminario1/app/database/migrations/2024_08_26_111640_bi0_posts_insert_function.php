<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Bi0PostsInsertFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create trigger to update searchtext column
        DB::statement('CREATE OR REPLACE FUNCTION bi0_posts_insert_function() RETURNS TRIGGER AS $$
        BEGIN
            NEW.searchtext := to_tsvector(\'pg_catalog.portuguese\', NEW.title || \' \' || NEW.content);
            RETURN NEW;
        END;
        $$ LANGUAGE plpgsql;');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP FUNCTION bi0_posts_insert_function');
    }
}
