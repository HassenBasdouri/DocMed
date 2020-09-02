$('body').on('keyup','#search',function(){
    var search = $(this).val();
    $.ajax({
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
                tableRow='<tr><th scope="row">'+value.id+'</th><td>'+value.name+'</td><td>'+value.lastname+'</td><td>'+value.CNAM+'</td><td>'+value.cin+'</td><td><a href="'+routeRe+'/'+value.id+'">consulter</a></td></tr>';
                $('#tbody_patients').append(tableRow);
            });
        }
    });
});
