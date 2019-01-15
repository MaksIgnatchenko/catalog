<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.01.19
 *
 */

namespace App\Modules\Companies\Helpers;


use App\Modules\Companies\Services\WeekDays;

class Schedule
{
    /**
     * @param array $companySchedule
     * @param array $attributes
     * @return string
     */
    public static function build(array $companySchedule = [], $attributes = []) : string
    {
        $attributesString = '';
        foreach($attributes as $key => $value) {
            $attributesString .= $key . '=' . '"' . $value . '" ';
        }
        $table =  '<table ' . $attributesString . '>';
        $weekDays = new WeekDays();
        foreach ($weekDays->getDays() as $day) {
            $table .= '<tr>';

            $table .= '<td width=30%>';
            $table .= $day['name'];
            $table .= '</td>';

            if ($companySchedule[$day['name']]['from'] ?? null) {
                $table .= '<td width=35%>';
                $table .= $companySchedule[$day['name']]['from'];
                $table .= '</td>';

                $table .= '<td width=35%>';
                $table .= $companySchedule[$day['name']]['to'];
                $table .= '</td>';
            } else {
                $table .= '<td colspan="2">';
                $table .= 'Free day';
                $table .= '</td>';
            }

            $table .= '</tr>';
        }
        $table .= '</table>';
        return $table;
    }
}