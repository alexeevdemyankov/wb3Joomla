<?php

class Webbase3ModelWb3_exec extends JModelList
{

    public function insert($schemeId, $get, $post, $files)
    {
        $schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $schemeFields = SchemeHelper::getFields($schemeId, 0);
        foreach ($schemeFields as $field) {
            if ($field->wb3_key == 1): continue;endif;
            if ($post[$field->wb3_field]):$insertArray[$field->wb3_field] = $post[$field->wb3_field];endif;
            if ($field->wb3_unique == 1):$uniqArray[$field->wb3_field] = $field->wb3_field;endif;
        }
        $return['success'] = DataHelper::insertRecord($schemeKey->wb3_base, $schemeKey->wb3_table, $schemeKey->wb3_field, $insertArray, $uniqArray);
        return $return;
    }

    public function delete($schemeId, $get, $post, $files)
    {
        $schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $return['success'] = DataHelper::deleteRecord($schemeKey->wb3_base, $schemeKey->wb3_table, $schemeKey->wb3_field, $get['wb3_checked']);
        return $return;
    }

    public function copy($schemeId, $get, $post, $files)
    {
        $schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $copiedRecords = DataHelper::getRecords($schemeKey->wb3_base, $schemeKey->wb3_table, $schemeKey->wb3_field, $get['wb3_checked']);
        foreach ($copiedRecords as $record) {
            $successArray[] = $this->insert($schemeId, null, $record, null)['success'];
        }
        if (in_array(0, $successArray)) {
            $return['error'] = 1;
        } else {
            $return['success'] = 1;
        }
        return $return;
    }

    public function edit($schemeId, $get, $post, $files)
    {

        $keyValues = explode(',', $get['wb3_checked']);

        foreach ($keyValues as $keyValue) {
            $schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
            $schemeFields = SchemeHelper::getFields($schemeId, 0);
            foreach ($schemeFields as $field) {
                if ($field->wb3_key == 1): continue;endif;
                if (!array_key_exists($field->wb3_field, $post)):continue;endif;
                $successArray[] = DataHelper::updateRecord($schemeKey->wb3_base, $schemeKey->wb3_table, $schemeKey->wb3_field, $keyValue, $field->wb3_field, $post[$field->wb3_field],
                    $field->wb3_unique);
            }
        }
        if (in_array(1, $successArray)) {
            $return['success'] = 1;
        } else {
            $return['error'] = 1;
        }
        return $return;
    }


}