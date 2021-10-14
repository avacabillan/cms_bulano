$('body').on('shown.bs.modal','.editClient',function(){
      
    var client_id = $(this).attr('data-id')
    
    $.get("{{route('editForm')}}"+ "/" + client_id + "/editClient",function(data){
        $('#headingsModal').html("Edit Client")
        $('#updateClientModal').modal('show')
        $('#updateBtn').val('updateClient')
        $('#client_id').val(data.id)
        $('#updateClientForm #ocn').val(data.ocn)
        $('#updateClientForm #tin').val(data.tin)
        $('#updateClientForm #client_name').val(data.client_name)
        $('#updateClientForm #email').val(data.email)
        $('#updateClientForm #client_contact').val(data.client_contact)
        $('#updateClientForm #reg_date').val(data.reg_date)
        $('#updateClientForm #trade_name').val(data.trade_name)
        $('#updateClientForm #mode').val(data.mode)
        $('#updateClientForm #corporate').val(data.corporate)
        $('#updateClientForm #unit_house_no').val(data.unit_house_no)
        $('#updateClientForm #street').val(data.street)
        $('#updateClientForm #client_city').val(data.client_city)
        $('#updateClientForm #client_province').val(data.client_province)
        $('#updateClientForm #client_postal').val(data.client_postal)
    })
}),
// UPDATE BUTTON
$('#updateBtn').click(function (e){
  e.preventDefault()
  $(this).html('Save')

  $.ajax({
    data: $('#updateClientForm').serialize(),
    url: "{{ route('updateClient') }}",
    type: "POST",
    dataType: 'json',
    success: function (data) {

        $('#updateClientForm').trigger("reset")
        $('#updateClientModal').modal('hide')
        table.draw()
   
    },
    error: function (data) {
        console.log('Error:', data)
        $('#updateBtn').html('Save Changes')
    }
  })

})

