<?php

use App\Models\Boite;
use App\Models\Confidentialite;
use App\Models\Domaine;
use App\Models\Nature;
use App\Models\Structure;
use App\Models\User;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('reference',200);
            $table->date('date');
            $table->text('objet');
            $table->text('path')->nullable();
            $table->foreignIdFor(Structure::class)->nullable();
            $table->text('observation')->nullable();
            $table->foreignIdFor(Boite::class)->nullable();
            $table->foreignIdFor(Confidentialite::class)->nullable();
            $table->foreignIdFor(Nature::class)->nullable();
            $table->foreignIdFor(Domaine::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
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
        Schema::dropIfExists('documents');
    }
};
