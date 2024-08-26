<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medias', function (Blueprint $table) {
           
            $table->bigIncrements("id");

            $table->string("mediable_type", 255);
            $table->unsignedBigInteger("mediable_id");

            $table->string("type", 20);

            $table->string("name", 100);

            $table->string("description", 255);
            $table->string("mime", 10)->nullable();

            $table->text("url");

            $table->char("actiavated", 1)->default(1);

            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("parent")->default(0);

            $table->string("commentable_type", 255);
            $table->unsignedBigInteger("commentable_id");

            $table->string("author", 120)->nullable();
            $table->string("author_email", 120)->nullable();

            $table->text("body");

            $table->integer('comment_count')->default(0);

            $table->boolean("activated")->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
        Schema::dropIfExists('comments');
    }
};
