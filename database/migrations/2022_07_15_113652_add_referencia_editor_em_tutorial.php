<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReferenciaEditorEmTutorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tutoriais', function (Blueprint $table) {
            $table->foreignId('editor_id')->constrained('editores');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutoriais', function (Blueprint $table) {
            $table->dropColumn('editor_id');
        });
        //
    }

}
