<?php

class Webbase3ModelWb3_add extends JModelList
{

    public function getScheme($sysVars)
    {
        $schemeId = $sysVars['wb3_scheme'];
        $return = new stdClass();
        $return->schemeInfo = SchemeHelper::getSchemeInfo($schemeId);
        $return->schemeKey = SchemeHelper::getFields($schemeId, 1)[0];
        $return->schemeFields = SchemeHelper::getFields($schemeId, 0);
        return $return;

    }

}