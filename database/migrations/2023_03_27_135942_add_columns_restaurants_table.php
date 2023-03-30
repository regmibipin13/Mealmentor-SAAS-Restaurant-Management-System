<?php

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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('slug')->nullable();
            $table->string('subdomain')->nullable();
            $table->boolean('approved')->default(true);
            $table->double('delivery_price_per_km', 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('subdomain');
            $table->dropColumn('approved');
            $table->dropColumn('delivery_price_per_km');
        });
    }
};
