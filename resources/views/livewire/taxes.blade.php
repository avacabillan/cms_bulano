<div>
@foreach($tax as $taxForm)
         <div class="mt-1">
              <label class="inline-flex items-center">
              <input type="checkbox" wire:click="getTax" value="{{$taxForm->id}}" wire:model="taxes"  >
                   <span class="ml-3 text-sm">{{ $taxForm->tax_form_no }}</span>
               </label>
          </div>
  @endforeach
</div>
