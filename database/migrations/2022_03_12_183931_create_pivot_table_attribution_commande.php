<?php

use App\Models\Attribution;
use App\Models\Commande;
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
        Schema::create('attribution_commande', function (Blueprint $table) {
            $table->foreignIdFor(Attribution::class)->constrained();
            $table->foreignIdFor(Commande::class)->constrained();
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
        Schema::dropIfExists('attribution_commande');
    }
};
