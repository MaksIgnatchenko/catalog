<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Company\Controllers;

use App\Modules\Admins\Models\Admin;
use App\Modules\Messages\DataTables\CompanyOutgoingMessagesDataTable;
use App\Modules\Messages\DTO\CreateMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Http\Company\Requests\StoreMessageCompanyRequest;
use App\Modules\Messages\Models\Message;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesController extends MessagesControllerAbstract
{
    public function __construct()
    {
        $this->viewDir = 'company.outgoingMessage';
        $this->recipientType = Admin::class;
        $this->indexRouteName = 'companyOutgoingMessages.index';
    }

    public function index(CompanyOutgoingMessagesDataTable $dataTable)
    {
        $companyId = Auth()->user()->company->id;
        $dataTable->setCompanyId($companyId);
        return $dataTable->render($this->viewDir . '.index');
    }

    public function create()
    {
        $dto = new CreateMessageDTO();
        return view($this->viewDir . '.create', ['dto' => $dto]);
    }

    public function store(StoreMessageCompanyRequest $request)
    {
        $companyOwner = Auth::user();
        $company = Auth::user()->company;
        $message = app()[Message::class];
        $message->fill($request->all());
        $message->recipientable_type = $this->recipientType;
        $message->email = $companyOwner->email;
        $message->phone = '11111111111';
        $company->outgoingMessages()->save($message);
        return redirect()->route('companyOutgoingMessages.index');
    }
}