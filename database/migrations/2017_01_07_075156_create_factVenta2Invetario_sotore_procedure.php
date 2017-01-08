<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactVenta2InvetarioSotoreProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared('
           CREATE DEFINER=`root`@`localhost` PROCEDURE `factVenta2Invetario`(_id int, _estadoN int)
BEGIN

DECLARE _estado_id int;
DECLARE done INT DEFAULT FALSE;
DECLARE _id1, _factura_id, _producto_id, _cantidad, _inventario_id int;
DECLARE _valor, _costo double;
DECLARE _lote Text;
DECLARE _tipo int;

DECLARE fact2Inven 
    CURSOR FOR SELECT id, factura_id, producto_id, cantidad, valor, costo, lote, inventario_id
    FROM facturadetalle where factura_id like _id;

DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
select estado_id, tipo into _estado_id, _tipo from factura where id = _id;

if _estado_id=1 and _estadoN =2 then    
    open fact2Inven;
    read_loop: LOOP
        FETCH fact2Inven INTO _id1, _factura_id, _producto_id, _cantidad, _valor, _costo, _lote, _inventario_id;
        IF done THEN
            LEAVE read_loop;
        END IF;
        if _tipo =2 then
            /*Facturas de Compra*/
            if (select id from inventario where producto_id=_producto_id and lote =_lote limit 1) is null then      
                INSERT INTO inventario(cantidad, valor, costo, lote, detalleFactura, producto_id)
                VALUES(_cantidad, _valor, _costo, _iva, _fecha_vencimiento, _lote, _id1, _producto);
            else
                update inventario set cantidad=cantidad+_cantidad where producto_id=_producto_id and lote =_lote;
            end if;
        elseif _tipo = 1 then
        /*Facturas de Venta*/
            select _cantidad;
            update inventario set cantidad=cantidad-_cantidad where id=_inventario_id;
        end if;
    END LOOP;
    delete from inventario where cantidad=0;
    
    update factura set estado_id=_estadoN where id like _id;
elseif _estado_id=1 and _estadoN =3 then
    update factura set estado_id=_estadoN where id like _id;
elseif _estado_id=1 and _estadoN =4 then
    update factura set estado_id=_estadoN where id like _id;    
end if;
END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         DB::unprepared('DROP PROCEDURE IF EXISTS factVenta2Invetario');
    }
}
