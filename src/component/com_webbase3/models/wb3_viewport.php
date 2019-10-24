<?php

class Webbase3ModelWb3_viewport extends JModelList
{

    public function getScheme($sysVars)
    {

        $schemeId = $sysVars['wb3_scheme'];
        $return = new stdClass();
        $return->schemeInfo = SchemeHelper::getSchemeInfo($schemeId);
        $return->schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $return->schemeFields = SchemeHelper::getFields($schemeId, 0);
        $return->schemeLinks = SchemeHelper::getSchemeLinks($schemeId);
        $return->schemeData = DataHelper::getSchemeData($return->schemeKey, $return->schemeFields, $sysVars);
        $return->schemePlugins = SchemeHelper::getSchemePlugins($schemeId);
        foreach ($return->schemeFields as $schemeField) {
            if ($schemeField->wb3_searchable == 1):$return->schemeSearchFields[] = $schemeField;endif;
        }


        return $return;
    }


}