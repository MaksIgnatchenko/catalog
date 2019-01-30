<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Admin\Controllers;

use App\Modules\Companies\Models\Company;
use App\Modules\Messages\DataTables\AdminOutgoingMessagesDataTable;
use App\Modules\Messages\DTO\CreateAdminMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Http\Admin\Requests\StoreMessageAdminRequest;
use App\Modules\Messages\Models\Message;
use App\Modules\Messages\Services\MessageSender\Factories\MessageSenderFactory;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesController extends MessagesControllerAbstract
{
    public function __construct()
    {
        $this->viewDir = 'admin.outgoingMessage';
        $this->indexRouteName = 'adminOutgoingMessages.index';
    }

    /**
     * @param AdminOutgoingMessagesDataTable $dataTable
     * @return mixed
     */
    public function index(AdminOutgoingMessagesDataTable $dataTable)
    {
        return $dataTable->render($this->viewDir . '.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $id)
    {
        $sender = Auth::user();
        $dto = new CreateAdminMessageDTO($sender, $id);
        return view($this->viewDir . '.create', ['dto' => $dto]);
    }

    /**
     * @param StoreMessageAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMessageAdminRequest $request)
    {
        $sender = Auth::user();
        $recipient = Company::find($request->recipientable_id);
        $messageSender = MessageSenderFactory::getInstance($sender, $recipient, $request->all());
        $messageSender->send();
        return redirect()->route($this->indexRouteName);
    }
}