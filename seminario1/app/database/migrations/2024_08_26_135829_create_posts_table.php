<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->default(DB::raw('gen_random_uuid()'));
            $table->timestampsTz();

            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->tsvector('searchtext')->index();

            $table->softDeletesTz();
        });
        // create trigger to update searchtext column
        DB::statement('CREATE TRIGGER bi0_posts_insert_trigger BEFORE INSERT OR UPDATE ON posts FOR EACH ROW EXECUTE FUNCTION bi0_posts_insert_function();');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
