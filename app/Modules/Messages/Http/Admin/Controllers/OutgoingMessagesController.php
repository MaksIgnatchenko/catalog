<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Admin\Controllers;

use App\Modules\Companies\Models\Company;
use App\Modules\Messages\DataTables\AdminOutgoingMessagesDataTable;
use App\Modules\Messages\DTO\CreateMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Http\Admin\Requests\StoreMessageAdminRequest;
use App\Modules\Messages\Models\Message;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesController extends MessagesControllerAbstract
{
    public function __construct()
    {
        $this->viewDir = 'admin.outgoingMessage';
        $this->recipientType = Company::class;
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
        $dto = new CreateMessageDTO($id);
        return view($this->viewDir . '.create', ['dto' => $dto]);
    }

    /**
     * @param StoreMessageAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMessageAdminRequest $request)
    {
        $sender = Auth::user();
        $message = app()[Message::class];
        $message->fill($request->all());
        $message->recipientable_type = $this->recipientType;
        $message->email = $sender->email;
        // TODO admin phone number?
        $message->phone = '11111111111';
        $sender->outgoingMessages()->save($message);
        return redirect()->route($this->indexRouteName);
    }
}