<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Jobs;

use App\Modules\Companies\Enums\CompanyStatusEnum;
use App\Modules\Companies\Models\Company;
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
    private $companyModel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->companyModel = app()[Company::class];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $companies = $this->companyModel->waitingForBlock()->changeStatusToday();
        $companies->update([
            'status' => CompanyStatusEnum::BLOCK,
        ]);
    }
}
