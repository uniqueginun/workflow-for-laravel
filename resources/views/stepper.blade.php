@php
    $steps = [
        1 => [
           'title' => 'التسكين',
           'last_update_at' =>  '2023/11/25 12:23',
           'user' =>  'عثمان محمد عثمان',
           'done' => true
        ],

        2 => [
           'title' => 'إعتماد التسكين',
           'last_update_at' =>  '2023/11/29 09:13',
           'user' =>  'عثمان محمد عثمان',
           'done' => true
        ],

        3 => [
           'title' => 'مراجعة المدير الأعلى',
           'last_update_at' =>  '',
           'user' =>  'محمد عمر الفاروق',
           'done' => false
        ]
    ];
@endphp

<div class="col-md-12 mt-5">
    <h4>خطوات التسكين</h4>

    <div id="emplacement-stepper" class="bs-stepper">
        <div class="bs-stepper-header">
            @foreach($steps as $step => $details)
            @unless($loop->index === 0) <div class="line"></div>@endunless
            <div class="step" data-target="#emplacement-nl-{{$step}}">
                <button type="button" class="btn step-trigger {{ $details['last_update_at'] ? 'active' : '' }}">
                    <span class="bs-stepper-circle text-white fe {{ $details['last_update_at'] ? 'fe-check-circle fe-20' : 'fe-pause fe-20' }}"></span>
                    <span class="bs-stepper-label {{ $details['last_update_at'] ? 'active' : '' }}">{{ $details['title'] }}</span>
                </button>
            </div>
            @endforeach
        </div>

        <div class="bs-stepper-content">
            @foreach($steps as $key => $value)
            <div id="emplacement-nl-{{$key}}" class="content d-none">
                <div class="card shadow-lg mt-4">
                    <div class="card-body font-weight-bold">
                        <div class="row">
                            <div class="col">
                                <span class="bs-stepper-circle">{{ $key }}</span> الخطوة: {{ $value['title'] }}
                            </div>
                            <div class="col">
                                <span class="fe fe-24 fe-user"></span>المسؤول: {{ $value['user'] }}
                            </div>
                            <div class="col">
                                <span class="fe fe-24 {{ $value['done'] ? 'fe-check-circle text-primary' : 'fe-pause text-dark' }}"></span> الحالة: {{ $value['done'] ? 'تم' : 'قيد الإنتظار' }}
                            </div>
                            <div class="col">
                                <span class="fe fe-24 fe-clock"></span> آخر تحديث: {{ $value['last_update_at'] ?: '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@push('js')
    <style>
        .active .bs-stepper-circle {
            background-color: #0c854e
        }

        .active .bs-stepper-label {
            color: #0c854e;
            font-size: large;
        }
    </style>

    <script>
       const stepper2 = new Stepper(document.querySelector('#emplacement-stepper'), {
            linear: false,
            animation: true
        })

       $('button.step-trigger').click(function (event) {
           const dataTarget = $(this).parent().data('target')

           $(dataTarget).removeClass('d-none')
       })
    </script>
@endpush
