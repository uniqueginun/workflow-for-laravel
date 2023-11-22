<?php

namespace Uniqueginun\Laraflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;

class WorkflowCPController extends Controller
{
    public function home(): Renderable
    {
        return view('laraflow::home');
    }

    public function create(): Renderable
    {
        $stepQuery = request()->input('step', 'service');

        $steps = collect([
            'service' => [
                'name' => 'بيانات الخدمة الأساسية',
                'active' => $stepQuery === 'service'
            ],
            'service-details' => [
                'name' => 'تفاصيل الخدمة',
                'active' => $stepQuery === 'service-details'
            ]
        ]);

        ray(session('wf'));

        [$prevStep, $nextStep] = $this->getStepControls($steps, $stepQuery);

        return view('laraflow::create-service', [
            'steps' => $steps,
            'currentStep' => $stepQuery,
            'nextStep' => $nextStep,
            'prevStep' => $prevStep
        ]);
    }

    private function getStepControls(Collection $steps, string $stepQuery): array
    {
        $getStepKey = fn($key) => $steps->keys()->get($key) ?? '';

        $activeKey = $steps->keys()->search($stepQuery);

        return [
            $getStepKey($activeKey - 1),
            $getStepKey($activeKey + 1)
        ];
    }
}
