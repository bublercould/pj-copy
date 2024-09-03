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
        Schema::create('news', function (Blueprint $table) {

            $table->id();
            $table->string('name', 255)->comment('หัวข้อ')->nullable();
            $table->longText('detail')->comment('รายละเอียด')->nullable();
            $table->longText('image')->comment('รูปภาพข่าวสาร')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }

};
