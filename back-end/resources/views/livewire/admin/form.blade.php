<div class="row">
    <x-form.input name="admin.name" label="Name:" patternClass="col-4" wire:model="admin.name" />
    <x-form.input name="admin.name" label="Email:" patternClass="col-4" wire:model="admin.name" />
    <div class="mt-3">
        <button class="btn btn-primary" wire:click="update" wire:loading.attr="disabled">Save</button>
    </div>
</div>
