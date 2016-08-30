<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    DB::unprepared('CREATE TRIGGER factura_BEFORE_INSERT BEFORE INSERT ON `factura` FOR EACH ROW
    BEGIN
        declare _numero int default 0;
        if new.tipo!=2 then
            select ifnull(max(numero),0)+1 into _numero from factura where tipo=new.tipo;
            set new.numero=_numero;
        end if;
    END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP TRIGGER `factura_BEFORE_INSERT`');
    }
}
