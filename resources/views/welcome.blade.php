@foreach ($taxTypes as $taxType)
<ul>{{$taxType->tax_type}}</ul>
@endforeach

@foreach ($forms as $form)
<ul>{{$form->tax_form_no}}</ul>
@endforeach