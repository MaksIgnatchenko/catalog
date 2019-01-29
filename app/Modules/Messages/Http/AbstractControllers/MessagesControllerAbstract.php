<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.01.19
 *
 */

namespace App\Modules\Messages\Http\AbstractControllers;

use App\Http\Controllers\Controller;
use App\Modules\Messages\DTO\ShowMessageDTO;
use App\Modules\Messages\Models\Message;

abstract class MessagesControllerAbstract extends Controller
{
    protected $viewDir;
    protected $recipientType;
    protected $indexRouteName;
//    public function index(CompanyIncomingMessagesDataTable $dataTable)
//    {
//        return $dataTable->render($this->viewDir . '.index');
//    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message)
    {
        $dto = new ShowMessageDTO($message);
        return view($this->viewDir . '.show', ['dto' => $dto]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route($this->indexRouteName);
    }
}