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
        Schema::create('contact', function (Blueprint $table) {

            $table->id()->comment('ลำดับ');
            $table->string('name', 255)->comment('ชื่อผู้ติดต่อ')->nullable();
            $table->string('email', 255)->comment('อีเมล์')->nullable();
            $table->string('title', 255)->comment('หัวเรื่องติดต่อ')->nullable();
            $table->longText('detail')->comment('รายละเอียด')->nullable();
            $table->string('contact_info', 255)->comment('ช่องทางการติดต่อกลับ')->nullable();
            $table->string('attach_file', 255)->comment('ไฟล์แนบ')->nullable();
            $table->longText('ref_code')->comment('หมายเลขอ้างอ้าง')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
