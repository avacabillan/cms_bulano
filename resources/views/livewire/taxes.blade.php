<div>
@foreach($taxForms as $taxForm)
         <div class="mt-1">
              <label class="inline-flex items-center">
              <input type="checkbox" value="{{ $taxForm->id }}" wire:model="taxForms.{{ $taxForm->id }}" class="form-checkbox h-6 w-6">
                   <span class="ml-3 text-sm">{{ $taxForm->tax_form_no }}</span>
               </label>
          </div>
  @endforeach
</div>