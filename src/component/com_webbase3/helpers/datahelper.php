<?php
/**
 * Created by PhpStorm.
 * User: alekseev.d
 * Date: 08.08.2019
 * Time: 9:31
 */

class DataHelper
{


    public static function getRecordsCount($database, $table, $field, $fieldValue)
    {
        $currentTable = ($database) ? '`' . $database . '`.`' . $table . '`' : '`' . $table . '`';
        $query = "SELECT count(1) FROM " . $currentTable . " WHERE $field ='" . $fieldValue . "'";
        return JFactory::getDbo()->setQuery($query)->loadResult();
    }


    public static function getRecords($database, $table, $keyField, $keyValues)
    {
        $currentTable = ($database) ? '`' . $database . '`.`' . $table . '`' : '`' . $table . '`';
        $query = "SELECT * FROM " . $currentTable . " WHERE $keyField in (" . $keyValues . ")";
        return JFactory::getDbo()->setQuery($query)->loadAssocList();
    }

    public static function insertRecord($database, $table, $keyField, $insertArray, $insertUnqArray)
    {
        $insertUnqCount = 0;
        foreach ($insertUnqArray as $insertUnq) {
            $insertUnqCount += self::getRecordsCount($database, $table, $insertUnq, $insertArray[$insertUnq]);
            if ($insertUnqCount > 0):return null;endif;
        }
        $currentTable = ($database) ? '`' . $database . '`.`' . $table . '`' : '`' . $table . '`';
        $query = "INSERT INTO " . $currentTable . "(" . implode(',', array_keys($insertArray)) . ") values ('" . implode("','", self::eacapeArray($insertArray)) . "')";
        JFactory::getDbo()->setQuery($query)->execute();
        $return = JFactory::getDbo()->getAffectedRows();
        $insertId = JFactory::getDbo()->setQuery($query)->insertid();
        $insertArray[$keyField] = $insertId;
        SysHelper::setLog($database, $table, 'insert', self::eacapeArray($insertArray));
        return $return;
    }


    public static function deleteRecord($database, $table, $keyField, $keyValues)
    {
        $currentTable = ($database) ? '`' . $database . '`.`' . $table . '`' : '`' . $table . '`';
        $query = "DELETE FROM " . $currentTable . " WHERE $keyField in (" . $keyValues . ")";
        JFactory::getDbo()->setQuery($query)->execute();
        $return = JFactory::getDbo()->getAffectedRows();
        $logData['key'] = $keyField;
        $logData['value'] = $keyValues;
        SysHelper::setLog($database, $table, 'delete', $logData);

        return $return;
    }


    public static function updateRecord($database, $table, $keyField, $keyValue, $upField, $upValue, $updateUnq)
    {
        if ($updateUnq == 1 && self::getRecordsCount($database, $table, $upField, $upValue) > 0):return null;endif;
        $upValue = JFactory::getDbo()->escape($upValue);
        $currentTable = ($database) ? '`' . $database . '`.`' . $table . '`' : '`' . $table . '`';
        $query = "UPDATE " . $currentTable . " SET `" . $upField . "` = '" . $upValue . "' WHERE `" . $table . "`.`" . $keyField . "`='" . $keyValue . "'";
        JFactory::getDbo()->setQuery($query)->execute();
        $return = JFactory::getDbo()->getAffectedRows();
        $logData['field'] = $upField;
        $logData['value'] = JFactory::getDbo()->escape($upValue);
        $logData['key'] = $keyField;
        $logData['id'] = $keyValue;
        SysHelper::setLog($database, $table, 'update', $logData);
        return $return;
    }


    /***Данные для ViewPort**/
    public static function getSchemeData($keyField, $fields, $sysVars)
    {
        if (!$keyField && !$fields):return null;endif;

        foreach ($fields as $field) {
            $selectValues[] = $field->wb3_table . '`.`' . $field->wb3_field;
        }
        $selectValues = '`' . implode('`,`', $selectValues) . '`';
        $selectTable = ($keyField->wb3_base) ? '`' . $keyField->wb3_base . '`.`' . $keyField->wb3_table . '`' : '`' . $keyField->wb3_table . '`';
        $selectLimit = ($sysVars['wb3_page'] > 0) ? ($sysVars['wb3_page'] * PageHelper::onPage()) . ', ' . PageHelper::onPage() : PageHelper::onPage();
        $schemeWhere = ($sysVars['wb3_key'] && $sysVars['wb3_val']) ? " AND `" . $keyField->wb3_table . "`.`" . $sysVars['wb3_key'] . "`='" . $sysVars['wb3_val'] . "'" : null;
        $schemeJoin = self::getJoinSlave($fields);
        /*Get search*/                
        $searchId= 's' . $sysVars['wb3_scheme'].'k'.$sysVars['wb3_key'].'v'.$sysVars['wb3_val'];
        $wb3Search = SysHelper::getDefaults('wb3_search_' .$searchId);
        $wb3Search = str_replace('*', '%', $wb3Search);
        $wb3SearchField = SysHelper::getDefaults('wb3_search_field_' .$searchId);
                        
        if ($wb3Search && $wb3SearchField) {
            //joinFix
            $wb3Search = trim($wb3Search);
            if (strpos($schemeJoin->queryJoinField, 'join__' . $wb3SearchField) !== false) {
                $wb3SearchFieldJoin = 'join__' . $wb3SearchField;
                $schemeSearch = " where ($wb3SearchField like '%" . $wb3Search . "%' or $wb3SearchFieldJoin like '%" . $wb3Search . "%' ) ";
            } else {
                $schemeSearch = " where ($wb3SearchField like '%" . $wb3Search . "%' ) ";
            }
        }

        /*Get ordering*/
        $wb3Order = SysHelper::getDefaults('wb3_order_' . $sysVars['wb3_scheme']);
        $wb3Direction = SysHelper::getDefaults('wb3_direction_' . $sysVars['wb3_scheme']);
        if ($wb3Order) {
            $wb3Direction = (!$wb3Direction) ? 'ASC' : $wb3Direction;
            //joinFix
            if (strpos($schemeJoin->queryJoinField, 'join__' . $wb3Order) !== false):$wb3Order = 'join__' . $wb3Order;endif;
            $schemeOrder = 'order by `' . $wb3Order . '` ' . $wb3Direction;
        }

        if ($selectLimit):$selectLimit = ' LIMIT ' . $selectLimit;endif;
        if ($sysVars['wb3_nolimit'] == 1):unset($selectLimit);endif;


        $query = "
                select
                  SQL_CALC_FOUND_ROWS                
                  *
                FROM
                (SELECT                 
                  $selectValues
                  $schemeJoin->queryJoinField
                FROM
                  $selectTable
                  $schemeJoin->queryJoin
                WHERE
                  1=1
                  $schemeWhere                                        
                ) as masterQuery
                  $schemeSearch
                  $schemeOrder                                   
                  $selectLimit
               ";

        if ($_GET['debug'] == 1) {
            echo $query;
        }

        $return['data'] = JFactory::getDbo()->setQuery($query)->loadAssocList();
        $return['count'] = JFactory::getDbo()->setQuery("SELECT FOUND_ROWS()")->loadResult();
        return $return;
    }

    //Джойним поля join__ИМЯПОЛЯ

    private static function getJoinSlave($fields)
    {
        $return = new stdClass();
        foreach ($fields as $field) {
            if ($field->wb3_table_slave) {
                if ($field->wb3_key_slave) {
                    $selectTable = ($field->wb3_base_slave) ? '`' . $field->wb3_base_slave . '`.`' . $field->wb3_table_slave . '`' : '`' . $field->wb3_table_slave . '`';
                    $return->queryJoinField[$field->wb3_field] = "join_" . $field->wb3_field . '.' . $field->wb3_field_slave . ' as join__' . $field->wb3_field;
                    $return->queryJoin[$field->wb3_field] = "
                        LEFT JOIN " . $selectTable . " as join_" . $field->wb3_field . "
                        on (join_" . $field->wb3_field . "." . $field->wb3_key_slave . "=" . $field->wb3_table . "." . $field->wb3_field . ")";
                }
            }
        }
        $return->queryJoinField = ($return->queryJoinField) ? "," . implode(",", $return->queryJoinField) : null;
        $return->queryJoin = ($return->queryJoin) ? implode(" ", $return->queryJoin) : null;
        return $return;

    }

    /***Данные для ViewPort**/


    public static function pre($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    public static function eacapeArray($array)
    {
        foreach ($array as $key => $value) {
            $array[$key] = JFactory::getDbo()->escape($value);
        }
        return $array;
    }

}



