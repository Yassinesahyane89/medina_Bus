<div class="row">
    <div class="form-group col-4">
        <label for="schedule.line_id" class="form-label">Line</label>
        <select wire:model="schedule.line_id" id="schedule.line_id" name="schedule.line_id" class="form-select">
            <option value="">Please select</option>
            @foreach ($lines as $line)
              <option value="{{$line->id}}">{{ $line->code }}</option>
            @endforeach
        </select>
        @error('schedule.line_id')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
    <div class="form-group col-4">
        <label for="schedule.station_id" class="form-label">station</label>
        <select wire:model="schedule.station_id" id="schedule.station_id" name="schedule.station_id" class="form-select">
            <option value="">Please select</option>
            @foreach ($stations as $station)
              <option value="{{$station->id}}">{{ $station->name }}</option>
            @endforeach
        </select>
        @error('schedule.station_id')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
    <div class="form-group col-4">
        <label for="schedule.direction" class="form-label">direction</label>
        <select wire:model="schedule.direction" id="schedule.direction" name="schedule.direction" class="form-select">
            <option value="">Please select</option>
            <option value="departure">departure</option>
            <option value="arrival">arrival</option>
        </select>
        @error('schedule.direction')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
    <x-form.input name="schedule.departure_time" label="departure Time:" type="time" patternClass="col-4" wire:model="schedule.departure_time" :min="now()->format('Y-m-d\TH:i')"/>
    <x-form.input name="schedule.arrival_time" label="arrival Time:" type="time" patternClass="col-4" wire:model="schedule.arrival_time" :min="now()->format('Y-m-d\TH:i')"/>

    <div class="mt-3">
        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">Save</button>
    </div>
</div>
