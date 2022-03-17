<?php

use App\Models\Attribution;
use App\Models\Etat;
use App\Models\Modele;
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
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('serialnumber',100)->unique();
            $table->foreignIdFor(Modele::class)->nullable();
            $table->foreignIdFor(Attribution::class)->nullable();
            $table->foreignIdFor(Etat::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels');
    }
};
