<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\Admin\Controllers;

use App\Modules\Companies\Models\Company;
use App\Modules\Messages\DataTables\AdminIncomingMessagesDataTable;
use App\Modules\Messages\DTO\ShowMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Models\Message;

class IncomingMessagesController extends MessagesControllerAbstract
{
    public function __construct()
    {
        $this->viewDir = 'admin.incomingMessage';
        $this->recipientType = Company::class;
        $this->indexRouteName = 'adminIncomingMessages.index';
    }

    public function index(AdminIncomingMessagesDataTable $dataTable)
    {
        return $dataTable->render($this->viewDir . '.index');
    }

    public function show(Message $message)
    {
        $dto = new ShowMessageDTO($message);
        return view($this->viewDir . '.show', ['dto' => $dto]);
    }
}