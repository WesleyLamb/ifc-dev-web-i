<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Bu0PostsUpdateFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE OR REPLACE FUNCTION bu0_posts_update_function() RETURNS TRIGGER AS $$
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
        //
    }
}
