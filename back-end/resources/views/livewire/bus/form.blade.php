<div class="row">
    <x-form.input name="bus.brand" label="brand:" type="text" patternClass="col-4" wire:model="bus.brand" />
    <x-form.input name="bus.purchase_date" label="purchase Date:" type="date" patternClass="col-4" wire:model="bus.purchase_date" />
    <x-form.input name="bus.passenger_capacity" label="passenger_capacity:" type="Number" patternClass="col-4" wire:model="bus.passenger_capacity" />
    <div class="mt-3">
        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">Save</button>
    </div>
</div>
