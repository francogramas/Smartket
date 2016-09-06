<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFact2InvenStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     DB::unprepared('
CREATE PROCEDURE `fact2invent` (_factura int)
BEGIN

INSERT INTO inventario (producto_id, cantidad, costo, valor, stockmin, lote, vence)
SELECT producto_id,cantidad,costo,valor,stockmin,lote,vence FROM facturadetalle where factura_id=_factura;

delete from inventario  where id in (select idInv from alminvtemp);
truncate table alminvtemp;
update factura set estado_id=2 where id = _factura;

END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP PROCEDURE IF EXISTS fact2invent');
    }
}
