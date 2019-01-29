<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.01.19
 *
 */

namespace App\Helpers;

class PaypalButton
{
    public static function insert()
    {
        return '<a target="_blank" href="https://www.paypal.com">'. '<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" alt="PayPal" />' . '</a>';
    }
}