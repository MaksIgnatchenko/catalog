<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\PublicSite\Controllers;

use App\Modules\Companies\Models\Company;
use App\Modules\Messages\DTO\CreateVisitorMessageDTO;
use App\Modules\Messages\Http\AbstractControllers\MessagesControllerAbstract;
use App\Modules\Messages\Services\MessageSender\Factories\MessageSenderFactory;
use App\Modules\Visitors\Model\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesToCompanyController extends MessagesControllerAbstract
{
    /**
     * OutgoingMessagesToCompanyController constructor.
     */
    public function __construct()
    {
        $this->indexRouteName = 'publicOutgoingMessagesToCompany.create';
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(int $id)
    {
        $sender = Auth::guard('visitor')->user() ?? app()[Visitor::class];
        $dto = new CreateVisitorMessageDTO($sender, $id);
        return view('test_message_to_company', ['dto' => $dto]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $sender = Auth::guard('visitor')->user() ?? app()[Visitor::class];
        $recipient = Company::find($request->recipientable_id);
        $messageSender = MessageSenderFactory::getInstance($sender, $recipient, $request->all());
        $messageSender->send();
        return redirect()->route($this->indexRouteName, ['id' => 2]);
    }
}