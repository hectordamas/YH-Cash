<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ContableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("INSERT INTO `contables` (`id`, `created_at`, `updated_at`, `codigo`, `name`, `type`) VALUES
        (1, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I001', 'Ingresos operativos', 'Ingreso'),
        (2, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I002', 'Ingreso Concesionario', 'Ingreso'),
        (3, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I003', 'Ingreso por Alquiler', 'Ingreso'),
        (4, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I004', 'Ingreso por Vallas', 'Ingreso'),
        (5, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I005', 'Ingreso Intercambio Divisa', 'Ingreso'),
        (6, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I006', 'Ingreso por Participacion Casino', 'Ingreso'),
        (7, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I007', 'Transferencia entre cuentas', 'Ingreso'),
        (8, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'I008', 'Ingreso Panorama', 'Ingreso'),
        (9, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A001', 'Agua', 'Egreso'),
        (10, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A002', 'Electricidad', 'Egreso'),
        (11, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A003', 'Asero Urbano', 'Egreso'),
        (12, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A004', 'Internet', 'Egreso'),
        (13, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A005', 'Telefono', 'Egreso'),
        (14, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A006', 'Extra por Eventos', 'Egreso'),
        (15, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A007', 'Gastos de Personal', 'Egreso'),
        (16, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A008', 'Parafiscales Laboral', 'Egreso'),
        (17, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A009', 'Bonificaciones Especiales', 'Egreso'),
        (18, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A010', 'Gastos Notarias', 'Egreso'),
        (19, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A011', 'Impuestos Nacionales', 'Egreso'),
        (20, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A012', 'Impuestos Municipales', 'Egreso'),
        (21, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A013', 'Pago a Entes Gubernamentales', 'Egreso'),
        (22, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A014', 'Servicios por Terceros', 'Egreso'),
        (23, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A015', 'Honorarios Profesionales', 'Egreso'),
        (24, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A016', 'Prestamo Intercompa?ia Casino', 'Egreso'),
        (25, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A017', 'Prestamo Intercompa?ia Brideshead', 'Egreso'),
        (26, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A018', 'Materiales y Articulos de Oficina', 'Egreso'),
        (27, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A019', 'Gastos Medicos', 'Egreso'),
        (28, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A020', 'Gastos de Transporte y Traslados', 'Egreso'),
        (29, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A021', 'Gastos Tecnologicos', 'Egreso'),
        (30, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'A022', 'Transferencia entre cuentas', 'Egreso'),
        (31, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B001', 'Viveres', 'Egreso'),
        (32, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B002', 'Alimentos y Bebidas', 'Egreso'),
        (33, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B003', 'Uniformes y Bioseguridad', 'Egreso'),
        (34, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B004', 'Reparaciones', 'Egreso'),
        (35, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B005', 'Mantenimiento General', 'Egreso'),
        (36, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'B006', 'Articulos de Limpieza', 'Egreso'),
        (37, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C001', 'Proyecto Piscina', 'Egreso'),
        (38, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C002', 'Proyecto Conexi?n Casa Rosada', 'Egreso'),
        (39, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C003', 'Proyecto Habitacion Piso 3', 'Egreso'),
        (40, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C004', 'Proyecto Bar Caracas', 'Egreso'),
        (41, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C005', 'Reparaci?n de Chiller', 'Egreso'),
        (42, '2022-06-10 08:00:36', '2022-06-10 08:00:36', 'C006', 'Otros Proyectos', 'Egreso')");
    }
}
