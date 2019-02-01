<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\Services\SearchCompanies\Interfaces;

use Illuminate\Pagination\Paginator;

interface SearchCompaniesServiceInterface
{
    /**
     * @param array $data
     * @param int $resultsPerPage
     * @return mixed
     */
    public function __construct(array $data, int $resultsPerPage);

    /**
     * @return Paginator
     */
    public function search() : Paginator;
}