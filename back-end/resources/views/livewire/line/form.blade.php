<div class="row">
    <x-form.input name="line.code" type="text" label="code:" patternClass="col-4" wire:model="line.code" />
    <div class="form-group col-4">
        <label for="" class="form-label">Start station</label>
        <select wire:model="line.start_station_id" class="form-select">
            <option value="">please select </option>
            @foreach ($stations as $station)
              <option value="{{$station->id}}">{{ $station->name }}</option>
            @endforeach
        </select>
        @error('line.start_station_id')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
    <div class="form-group col-4">
        <label for="" class="form-label">End station</label>
        <select wire:model="line.end_station_id" class="form-select">
            <option value="">please select </option>
            @foreach ($stations as $station)
              @if($station->id != $line->start_station_id)
                <option value="{{$station->id}}">{{ $station->name }}</option>
              @endif
            @endforeach
        </select>
        @error('line.end_station_id')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
     <div class="form-group col-4">
        <label for="" class="form-label">Bus</label>
        <select wire:model="line.bus_id" class="form-select">
            <option value="">please select </option>
            @foreach ($buses as $bus)
              <option value="{{$bus->id}}">{{ $bus->brand }}</option>
            @endforeach
        </select>
        @error('line.bus_id')
          <div class="invalid-feedback" style="display: block">
            <span>{{ $message }}</span>
          </div>
        @enderror
    </div>
    <x-form.input name="line.departure_time" label="departure Time:" type="time" patternClass="col-4" wire:model="line.departure_time" :min="now()->format('Y-m-d\TH:i')"/>
    @if ($errors->has('departure_time'))
        <span class="error">{{ $errors->first('departure_time') }}</span>
    @endif
    <x-form.input name="line.arrival_time" label="Arrival Time:" type="time" patternClass="col-4" wire:model="line.arrival_time" :min="now()->format('Y-m-d\TH:i')" />
    @if ($errors->has('arrival_time'))
        <span class="error">{{ $errors->first('arrival_time') }}</span>
    @endif
    <x-form.input name="line.distance_km" label="distance_km:" type="number" patternClass="col-4" wire:model="line.distance_km" />
    <div class="mt-3">
        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">Save</button>
    </div>
</div>
