<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Company\Controllers;

use App\Modules\Admins\Models\Admin;
use App\Modules\Messages\DataTables\CompanyIncomingMessagesDataTable;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;

class IncomingMessagesController extends MessagesControllerAbstract
{
    public function __construct()
    {
        $this->viewDir = 'company.incomingMessage';
        $this->recipientType = Admin::class;
        $this->indexRouteName = 'companyIncomingMessages.index';
    }

    public function index(CompanyIncomingMessagesDataTable $dataTable)
    {
        $companyId = Auth()->user()->company->id;
        $dataTable->setCompanyId($companyId);
        return $dataTable->render($this->viewDir . '.index');
    }
}