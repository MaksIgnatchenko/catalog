<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Company\Controllers;

use App\Modules\Admins\Models\Admin;
use App\Modules\Messages\DataTables\CompanyOutgoingMessagesDataTable;
use App\Modules\Messages\DTO\CreateCompanyMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Http\Company\Requests\StoreMessageCompanyRequest;
use App\Modules\Messages\Services\MessageSender\Factories\MessageSenderFactory;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesController extends MessagesControllerAbstract
{
    /**
     * OutgoingMessagesController constructor.
     */
    public function __construct()
    {
        $this->viewDir = 'company.outgoingMessage';
        $this->indexRouteName = 'companyOutgoingMessages.index';
    }

    /**
     * @param CompanyOutgoingMessagesDataTable $dataTable
     * @return mixed
     */
    public function index(CompanyOutgoingMessagesDataTable $dataTable)
    {
        $companyId = Auth()->user()->company->id;
        $dataTable->setCompanyId($companyId);
        return $dataTable->render($this->viewDir . '.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $sender = Auth::user()->company;
        $dto = new CreateCompanyMessageDTO($sender);
        return view($this->viewDir . '.create', ['dto' => $dto]);
    }

    /**
     * @param StoreMessageCompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMessageCompanyRequest $request)
    {
        $sender = Auth::user()->company;
        $recipient = app()[Admin::class];
        $messageSender = MessageSenderFactory::getInstance($sender, $recipient, $request->all());
        $messageSender->send();
        return redirect()->route($this->indexRouteName);
    }
}