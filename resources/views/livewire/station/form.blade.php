<div class="row">
    <x-form.input name="station.code" label="code:" patternClass="col-4" wire:model="station.code" />
    <x-form.input name="station.name" label="name:" patternClass="col-4" wire:model="station.name" />
    <x-form.input name="station.address" label="address:" patternClass="col-4" wire:model="station.address" />
    <div class="mt-3">
        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">Save</button>
    </div>
</div>
