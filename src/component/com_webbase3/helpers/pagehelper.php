<?php
/**
 * Copyright (c) 2019. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

class PageHelper
{
    public static function onPage()
    {
        $onPageDefault = SysHelper::getDefaults('wb3_onpage');
        return (!$onPageDefault) ? 20 : $onPageDefault;
    }

    public static function inlinePage()
    {
        return 9;
    }

    public static function getPagination($numRows, $httpString, $type)
    {
        $buttonFunction = 'makePageButton' . $type;

        $onPage = self::onPage();
        $allPages = ceil($numRows / $onPage);

        if ($allPages > 1) {
            $inlinePages = self::inlinePage();
            $currentPage1 = JFactory::getApplication()->input->get('wb3_page', '', '');
            $currentPage1 = (!$currentPage1) ? 0 : $currentPage1;
            if ($numRows <= $onPage) {
                return null;
            }
            if ($currentPage1 <= floor($inlinePages / 2)) {
                $start = 0;
                $end = $inlinePages;
            }
            if ($currentPage1 > floor($inlinePages / 2)) {
                $end = $currentPage1 + floor($inlinePages / 2);
                $end = ($end >= $allPages) ? $allPages : $end;
                $start = $end - $inlinePages;
                $start = ($start < 0) ? 0 : $start;
            }


            if ($end < $allPages):$pageEnd = self::$buttonFunction($httpString, '>', '', $allPages - 1);endif;
            if ($currentPage1 > (floor($inlinePages / 2) + 1)) :$pageStart = self::$buttonFunction($httpString, '<', '', 0);endif;

            if ($end > $allPages) {
                $end = $allPages;
            }
            for ($i = $start; $i < $end; $i++) {
                $activeClass = ($i == $currentPage1) ? 1 : 0;
                $pages[] = self::$buttonFunction($httpString, $i + 1, $activeClass, $i);
            }
            $pages[] = $pageEnd;


            $pages = implode('', $pages);
            $pages = "<ul class='pagination pagination-sm flex-sm-wrap'>$pages</ul>";
            $return = new stdClass();
            $return->pages = $pages;
            $return->current = $currentPage1;
            $return->all_pages = $allPages;
            return $return;
        }
    }


    private static function makePageButtonAjax($pageHttpString, $pageTitle, $activeClass, $pageId)
    {
        $pageHttpString = preg_replace('/([?&])wb3_page=[^&]+(|$)/', '', $pageHttpString);
        $pageHttpString = ($pageId > 0) ? $pageHttpString . '&wb3_page=' . $pageId : $pageHttpString;
        $activeClass = ($activeClass == 1) ? "active" : null;
        return '
                 <li class="page-item ' . $activeClass . '">
                 <a class="page-link" href="javascript:void(0);" onclick="loadRaw(\'' . $pageHttpString . '\',\'wb3_main\',1)">' . $pageTitle . ' </a>
                 </li>';
    }


}