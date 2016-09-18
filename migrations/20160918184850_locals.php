<?php

use \App\Migrations\Migration;

class Locals extends Migration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function up(){

        $this->schema->create('Locals', function(Illuminate\Database\Schema\Blueprint $table){
            $table->increments('id');
            $table->string('slug');
            $table->string('nombre')->unique();
            $table->boolean('status');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });

    }
    public function down(){
         $this->schema->drop('Locals');
    }
}
