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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
        });
         Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['slug' => 'admin'],
            ['slug' => 'user'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         if (Schema::hasTable('roles')) {
            Schema::dropIfExists('roles');
        }
        if(Schema::hasTable('user_role')) {
            Schema::dropIfExists('user_role');
        }
       
    }
};
