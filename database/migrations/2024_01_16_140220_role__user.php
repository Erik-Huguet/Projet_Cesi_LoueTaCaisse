<?php

use App\Models\Roles;
use App\Models\Users;
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
       Schema::create('role_users', function (Blueprint $table){
           $table->foreignIdfor(Users::class)->constrained();
           $table->foreignIdfor(Roles::class)->constrained();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
