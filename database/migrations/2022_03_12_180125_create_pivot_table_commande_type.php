<?php

use App\Models\Commande;
use App\Models\Type;
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
        Schema::create('commande_type', function (Blueprint $table) {
            $table->foreignIdFor(Commande::class)->constrained();
            $table->foreignIdFor(Type::class)->constrained();
            $table->integer('quantite');
            $table->integer('quantite_attribue');
            $table->text('observation');
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
        Schema::dropIfExists('commande_type');
    }
};
