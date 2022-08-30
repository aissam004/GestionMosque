<?php

use App\Models\Compte;
use App\Models\Personne;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('total')->default(0);
            $table->foreignIdFor(Personne::class)->nullable()->constrained()
                                                        ->cascadeOnUpdate()
                                                        ->nullOnDelete();
            $table->boolean('isincome')->default(true);
            $table->date('date')->nullable();
            $table->integer('avoir')->default(0);
            $table->text('detail')->nullable();
            $table->foreignIdFor(Compte::class)->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
