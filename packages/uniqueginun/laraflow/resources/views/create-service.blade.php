@extends('laraflow::layout.master')

@section('title', 'Control Panel - Home')

@section('content')
    <ul class="nav nav-tabs" id="serviceCreation" role="tablist">
        @foreach($steps as $step => $details)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $details['active'] ? 'active' : '' }}" id="{{ $step }}-tab" role="tab" aria-controls="{{ $step }}">
                    {{ $details['name'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content my-3" id="serviceCreationContent">
        @foreach($steps as $step => $details)
            <div class="tab-pane fade {{ $details['active'] ? 'show active' : '' }}" id="{{ $step }}" role="tabpanel" aria-labelledby="{{ $step }}-tab">
                @include("laraflow::steps.{$step}")
            </div>
        @endforeach
    </div>
@endsection

@push('js')
    <script>
        window.bootstrap.Tab.getInstance(
            document.querySelector('#serviceCreation a[href="#{{ $currentStep }}"]')
        ).show()
    </script>
@endpush
