<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Datatables\CompanyDataTable;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CompanyDataTable $companyDataTable
     * @return mixed
     */
    public function index(CompanyDataTable $companyDataTable)
    {
        return $companyDataTable->render('company.index');
    }
}
