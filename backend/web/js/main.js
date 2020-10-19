$(function (){
    $('#modalButton').click(function (){
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });
    $('.modalButton').click(function (){
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    })

    /*$('#modal').modal('toggle').find('#modalContent').load($(this).attr('value'));*/
})