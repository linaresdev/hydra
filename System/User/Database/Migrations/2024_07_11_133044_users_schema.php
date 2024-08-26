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
        Schema::table("users", function(Blueprint $table)
        {
            $table->string('type',20)->default("user")->after("id");
            $table->string('name', 80)->nullable()->change();
            $table->string("firstname",30)->nullable()->after("name");    
            $table->string("lastname",30)->nullable()->after("firstname");
            $table->string("rnc",30)->nullable()->after("lastname");
            $table->string('cellphone')->nullable()->after("rnc");            
            $table->string('user')->nullable()->after("cellphone");
            $table->char("activated",1)->default(0)->after("remember_token");
        });

        Schema::create('profiles', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("user_id")->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
 
            $table->string("title", 60)->nullable();
            $table->string('gender',30)->nullable();
            $table->text("biography", 1000)->nullable();
            $table->string("website", 45)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
        
        Schema::table("users", function(Blueprint $table)
        {
            $table->dropColumn([
                "type",
                "firstname",
                "lastname",
                "rnc",
                "user",
                "cellphone",
                "activated"
            ]);
        });
    }
};
