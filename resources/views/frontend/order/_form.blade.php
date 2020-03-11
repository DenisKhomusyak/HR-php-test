<div class="form-group">
    <div class="row">
        {!! Form::label('client_email', 'Email client', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('client_email', $model && $model->client_email ? $model->client_email : '', ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('partner_id', 'Partner', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('partner_id', $partnersArray, $model->partner_id, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        {!! Form::label('status', 'Status', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status', $statusesArray, $model->status, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>