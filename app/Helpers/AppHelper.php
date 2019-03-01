<?php
/**
 * Created by PhpStorm.
 * User: flynn
 * Date: 22/02/19
 * Time: 12:41 AM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class AppHelper
{

    public function getColumnsInputHtml($columns_and_types){

//        dd($columns_and_types);

        $columns_and_types_with_input_html = [];

        foreach($columns_and_types as $column){

//            $columns_and_types_with_input_html = $column;
//            dd($column['type']);

            $temp = array();


            if($column['type'] == 'integer'){

                if(substr($column['column'], -2) == 'id'){

                    $model_name = 'App\\'.ucfirst(substr($column['column'],0,-3));

//                    dd($model_name);

                    $all_objects = $model_name::all();

//                    dd($all_objects);

                    $options = '';


                    foreach($all_objects as $o){

                        $options .= '<option value="'.$o->id.'">'.$o->name.'</option>';

                    }

                    $temp = $column;
                    $temp['input_html'] = '<div class="form-group"><label for="usr">'.ucfirst(substr($column['column'],0,-3)).'s:</label><select class="form-control" name="'.str_replace(' ','_',$column['column']).'">'.$options.'</select></div>';

                    $columns_and_types_with_input_html []= $temp;


                }
                else{

                    $temp = $column;
                    $temp['input_html'] = '<div class="form-group"><label for="usr">'.ucfirst($column['column']).':</label><input type="number" class="form-control" name="'.str_replace(' ','_',$column['column']).'"></div>';

                    $columns_and_types_with_input_html []= $temp;
                }


            }
            else{

                $temp = $column;
                $temp['input_html'] = '<div class="form-group"><label for="usr">'.ucfirst($column['column']).':</label><input type="text" class="form-control" name="'.$column['column'].'"></div>';

                $columns_and_types_with_input_html []= $temp;
            }
        }

//        dd($columns_and_types_with_input_html);

        return $columns_and_types_with_input_html;


    }


    public function getColumnsFromObject($object)
    {

        $table = $object->getTable();

//        dd($table);

        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        if (($key = array_search('id', $columns)) !== false) {
            unset($columns[$key]);
        }
        if (($key = array_search('created_at', $columns)) !== false) {
            unset($columns[$key]);
        }
        if (($key = array_search('updated_at', $columns)) !== false) {
            unset($columns[$key]);
        }

        $reset_ed_columns = array_values($columns);
        $object_adjusted_without_underscore_reset_ed_columns = [];
        $object_adjusted_without_underscore_reset_ed_columns_with_type = [];

        foreach($reset_ed_columns as $column){

            $temp = array();

            $object_adjusted_without_underscore_reset_ed_columns []= str_replace("_"," ",$column);

            $temp['column']= str_replace("_"," ",$column);
            $temp['type']= DB::connection()->getDoctrineColumn($table, $column)->getType()->getName();

            ;

            $object_adjusted_without_underscore_reset_ed_columns_with_type []= $temp;


        }

//        dd($object_adjusted_without_underscore_reset_ed_columns_with_type);


        return [
            0=>$object_adjusted_without_underscore_reset_ed_columns,
            1=>$reset_ed_columns,
            2=> $object_adjusted_without_underscore_reset_ed_columns_with_type
        ];
    }
}
