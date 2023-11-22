<form method="post" action="?step={{ $nextStep ?: 'service' }}"> @csrf
    <input type="hidden" value="{{ $currentStep }}" name="current_step" />
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" placeholder="Service details Name" name="wf[{{ $currentStep }}][service_details_name]" />
    </div>
    <div class="form-group">
        @include('laraflow::steps.wizard-buttons')
    </div>
</form>
