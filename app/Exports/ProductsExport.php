<?php

namespace App\Exports;

use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'sku',
            'nombre',
            'precio',
            'precio_descuento',
            'precio_ferretero',
            'destacado',
            'cantidad',
            'ancho',
            'alto',
            'largo',
            'peso',
            'descripcion_corta',
            'descripcion',
            'categoria',
            'marca',
            'activo'
        ];
    }
    public function collection()
    {
        $array = [];

        $productos = \App\Models\Producto::join('categorias', 'categorias.id', '=', 'productos.categoria_id')
            ->join('producto_termino', 'producto_termino.producto_id', '=', 'productos.id')
            ->leftJoin('terminos', 'terminos.id', '=', 'producto_termino.termino_id')
            ->leftJoin('atributos', 'atributos.id', '=', 'terminos.atributo_id')
            ->select('terminos.nombre as marca', 'terminos.atributo_id as tipotermino', 'productos.sku', 'productos.nombre', 'productos.precio', 'productos.precio_descuento', 'productos.precio_ferretero', 'productos.destacado', 'productos.cantidad', 'productos.ancho', 'productos.alto', 'productos.largo', 'productos.peso', 'productos.descripcion_corta', 'productos.descripcion', 'categorias.slug', 'productos.activo' )
            ->get();

        foreach ($productos as $key => $value) {
            if( $value['tipotermino'] == 1){

                if( $value['destacado']== '0' && $value['activo'] == '0'){
                    $array[] = [
                        "sku" => $value['sku'],
                        "nombre" => $value['nombre'],
                        "precio" => $value['precio'],
                        "precio_descuento" => $value['precio_descuento'],
                        "precio_mayorista" => $value['precio_ferretero'],
                        "destacado" => '0',
                        "cantidad" => $value['cantidad'],
                        "ancho" => $value['ancho'],
                        "alto" => $value['alto'],
                        "largo" => $value['largo'],
                        "peso" => $value['peso'],
                        "descripcion_corta" => $value['descripcion_corta'],
                        "descripcion" => $value['descripcion'],
                        "slug" => $value['slug'],
                        "marca" => $value['marca'],
                        "activo" => '0'
                    ];
                }

                elseif( $value['destacado'] == '0' && $value['activo']== '1'){
                    $array[] = [
                        "sku" => $value['sku'],
                        "nombre" => $value['nombre'],
                        "precio" => $value['precio'],
                        "precio_descuento" => $value['precio_descuento'],
                        "precio_mayorista" => $value['precio_ferretero'],
                        "destacado" => '0',
                        "cantidad" => $value['cantidad'],
                        "ancho" => $value['ancho'],
                        "alto" => $value['alto'],
                        "largo" => $value['largo'],
                        "peso" => $value['peso'],
                        "descripcion_corta" => $value['descripcion_corta'],
                        "descripcion" => $value['descripcion'],
                        "slug" => $value['slug'],
                        "marca" => $value['marca'],
                        "activo" => '1'
                    ];
                }
                elseif( $value['destacado'] == '1' && $value['activo'] == '0') {
                    $array[] = [
                        "sku" => $value['sku'],
                        "nombre" => $value['nombre'],
                        "precio" => $value['precio'],
                        "precio_descuento" => $value['precio_descuento'],
                        "precio_mayorista" => $value['precio_ferretero'],
                        "destacado" => '1',
                        "cantidad" => $value['cantidad'],
                        "ancho" => $value['ancho'],
                        "alto" => $value['alto'],
                        "largo" => $value['largo'],
                        "peso" => $value['peso'],
                        "descripcion_corta" => $value['descripcion_corta'],
                        "descripcion" => $value['descripcion'],
                        "slug" => $value['slug'],
                        "marca" => $value['marca'],
                        "activo" => '0'
                    ];
                }
                elseif( $value['destacado'] == '1' && $value['activo'] == '1') {
                $array[] = [
                    
                    "sku" => $value['sku'],
                    "nombre" => $value['nombre'],
                    "precio" => $value['precio'],
                    "precio_descuento" => $value['precio_descuento'],
                    "precio_mayorista" => $value['precio_ferretero'],
                    "destacado" => '1',
                    "cantidad" => $value['cantidad'],
                    "ancho" => $value['ancho'],
                    "alto" => $value['alto'],
                    "largo" => $value['largo'],
                    "peso" => $value['peso'],
                    "descripcion_corta" => $value['descripcion_corta'],
                    "descripcion" => $value['descripcion'],
                    "slug" => $value['slug'],
                    "marca" => $value['marca'],
                    "activo" => '1'
                ];
                }
            }

        }


        // dd($array);

        return collect($array);

        

    }
}