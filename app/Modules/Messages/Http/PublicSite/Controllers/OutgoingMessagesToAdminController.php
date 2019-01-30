<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.01.19
 *
 */

namespace App\Modules\Messages\Http\PublicSite\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Admin;
use App\Modules\Messages\DTO\CreateVisitorMessageDTO;
use App\Modules\Messages\Services\MessageSender\Factories\MessageSenderFactory;
use App\Modules\Visitors\Model\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutgoingMessagesToAdminController extends Controller
{
    /**
     * OutgoingMessagesToCompanyController constructor.
     */
    public function __construct()
    {
        $this->indexRouteName = 'publicOutgoingMessagesToAdmin.create';
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $sender = Auth::guard('visitor')->user() ?? app()[Visitor::class];
        $dto = new CreateVisitorMessageDTO($sender);
        return view('test_message_to_admin', ['dto' => $dto]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $sender = Auth::guard('visitor')->user() ?? app()[Visitor::class];
        $recipient = app()[Admin::class];
        $messageSender = MessageSenderFactory::getInstance($sender, $recipient, $request->all());
        $messageSender->send();
        return redirect()->route($this->indexRouteName);
    }
}