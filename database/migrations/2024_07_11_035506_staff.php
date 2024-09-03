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
        Schema::create('staff', function (Blueprint $table) {

            $table->id()->comment('ลำดับ');
            $table->string('name', 255)->comment('ชื่อเต็มบุคลากร')->nullable();
            $table->longText('position')->comment('ตำแหน่งงาน')->nullable();
            $table->longText('image')->comment('รูปภาพ')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }

};
