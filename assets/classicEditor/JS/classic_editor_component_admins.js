(function($){
   

    $(document).ready(()=>{
        $('#jsEnqueuer_btn').click(()=>{
            $('#jsEnqueuerModal').modal('show');
        })

        $('#uploadFile').click(()=>{
            event.preventDefault();
            var file=$('#jsFileID').prop('files')[0];
            
            var form_data = new FormData();                  
            form_data.append('file', file);
            form_data.append('name',file.name);
            form_data.append('action', 'storingFile');
            console.log(file.name);
            $.ajax(
                {
                    url:classic_ajax.ajax_url,
                    type:'POST',
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success:(msg)=>{
                        console.log(msg);
                    }
            })
        })
    })

})(jQuery);