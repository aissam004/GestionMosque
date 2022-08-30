<?php

use App\Models\Etat;
use App\Models\Marque;
use App\Models\Position;
use App\Models\Modele;
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
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('reference',300)->nullable();
            $table->date('date')->nullable();
            $table->text('observation')->nullable();
            $table->foreignIdFor(Marque::class)->nullable()->constrained()
                                    ->cascadeOnUpdate()
                                    ->nullOnDelete();
            $table->foreignIdFor(Type::class)->constrained()
                                            ->cascadeOnUpdate();
            $table->foreignIdFor(Position::class)->nullable()->constrained()
                                            ->cascadeOnUpdate()
                                            ->nullOnDelete();
            $table->foreignIdFor(Etat::class)->nullable()->constrained()
                                        ->cascadeOnUpdate()
                                        ->nullOnDelete();
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
