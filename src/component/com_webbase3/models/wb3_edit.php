<?php

class Webbase3ModelWb3_edit extends JModelList
{
    public function getScheme($sysVars)
    {
        $schemeId = $sysVars['wb3_scheme'];
        $return = new stdClass();
        $return->schemeInfo = SchemeHelper::getSchemeInfo($schemeId);
        $return->schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $return->schemeFields = SchemeHelper::getFields($schemeId, 0);
        $return->schemeData = DataHelper::getRecords($return->schemeKey->wb3_base, $return->schemeKey->wb3_table, $return->schemeKey->wb3_field, $sysVars['wb3_checked'])[0];
        return $return;

    }
}