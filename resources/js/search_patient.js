$('body').on('keyup','#search',function(){
    var search = $(this).val();
    if(search != '')
    {$.ajax({
        method:'POST',
        url:route,
        dataType:'json',
        data:{
            '_token':token,
            search :search
        },
        success: function(res){
            var tableRow='';
            $('#tbody_patients').html('');
            $.each(res , function(index , value){
                tableRow='<tr><th scope="row">'+value.id+'</th><td><a href="'+routeRe+'/'+value.id+'">'+value.name+'</a></td><td>'+value.lastname+'</td><td>'+value.cnam+'</td><td>'+value.cin+'</td><td><a href="'+routeEdit+'/'+value.id+'/edit"><i class="fas fa-edit fa-xs"></a></td><td><a href="'+routeRe+'/'+value.id+'/rencontres">'+tradList+'</a> <a href="'+routeNew+'?id='+value.id+'">'+tradNewMeeting+'</a></td></tr>';
                $('#tbody_patients').append(tableRow);
            });
        }
    });}
});

$(document).ready(function () {
    $('#select_client').selectize({
        sortField: 'text'
    });
});
