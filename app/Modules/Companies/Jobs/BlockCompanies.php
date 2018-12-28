<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Jobs;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BlockCompanies implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var mixed
     */
    private $companyModelName;

    /**
     *  Create a new job instance.
     *
     * @param string $companyModelName
     */
    public function __construct(string $companyModelName)
    {
        $this->companyModelName = $companyModelName;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $companyModel = new $this->companyModelName;
        $companies = $companyModel->waitingForBlock()->changeStatusToday();
        $companies->update([
            'status' => CompanyStatusEnum::BLOCK,
            'date_change_status' => null
        ]);
    }
}
