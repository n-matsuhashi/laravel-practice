<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('施設名');
            $table->string('address', 255)->unique()->comment('住所');
            $table->char('post_code', 7)->nullable()->comment('郵便番号');
            $table->integer('stair')->comment('募集階');
            $table->text('comment')->default('お問い合わせください')->comment('コメント');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
}
