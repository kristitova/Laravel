<?php
declare(strict_types=1);
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():  void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('caption', 191);
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():  void
    {
        Schema::dropIfExists('resources');
    }
};
