<script>
    // dynamic cart from qty key but not checked
    var diskon = 0;
    var tipe_diskon;
    var presentase;
    var global_subtotal;

    function addDiskon(){
        event.preventDefault();
        var allVals = [];
        var kode = $('#inp_diskon').val() || null;
        $('.fill-control-input:checked').each(function(){
            allVals.push($(this).attr('data-id'));
        });
        if (allVals.length === 0) {
            Swal.fire({
                title: "Opps!",
                text: "Anda belum memilih produk",
                icon: "error",
            });
        }else{
            if(kode != null){
                var url = "{{route('cart.addpromo')}}";
                $.ajax({
                        url: url, //harus sesuai url di buat di route
                        type: "POST",
                        data: {
                            kode: kode,
                        },
                        cache: false,
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                var item = JSON.parse(dataResult.message);
                                tipe_diskon = item.tipe_diskon; 
                                diskon = item.jumlah_diskon;

                                if(tipe_diskon === 'presentase'){
                                    diskon = global_subtotal * diskon;
                                    presentase = item.jumlah_diskon;
                                    console.log(diskon);
                                }else{
                                    diskon = item.jumlah_diskon;
                                }
                                

                                var total = global_subtotal - diskon; 
                                
                                $('#diskon_inp').val(diskon);
                                $('#id_diskon').val(item.id);

                                // change diskon to rupiah
                                var	number_string = diskon.toString(),
                                        sisa 	= number_string.length % 3,
                                        rupiah 	= number_string.substr(0, sisa),
                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                            
                                if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');    
                                }

                                // change total to rupiah
                                var	number_string = total.toString(),
                                        sisa 	= number_string.length % 3,
                                        rupiah2 	= number_string.substr(0, sisa),
                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                            
                                if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah2 += separator + ribuan.join('.');    
                                }
                                $('#diskon_text').text(rupiah); 
                                $('#total_text').text(rupiah2);

                                Swal.fire({
                                    title: "Selamat anda mendapat promo "+item.nama_promo,
                                    icon: "success",
                                });
                            } else if (dataResult.statusCode == 201) {
                                Swal.fire({
                                    title: "Opps!",
                                    text: dataResult.message,
                                    icon: "error",
                                });
                                $('#diskon_text').text(0); 
                            }
                        },
                        error: function (error) {
                            console.log(error);
                            Swal.fire({
                                title: "Opps!",
                                text: "Anda Harus login Terlebih Dahulu!",
                                icon: "error",
                            });
                        },
                });
            }
        }; 
    }

    $(document).ready(function() {
        var proQty = $('.pro-qty');
        var subtotal;
        // dynamic cart from qty key
        proQty.on('click', '.qtybtn', function () {
            var qty = parseInt($(this).parent().find('.qty').val());
            var harga = parseInt($(this).parent().parent().find('.harga_inp').val());
            var id = $(this).parent().parent().data('id');                

            subtotal = qty * harga;
            
            $('#checkbox_'+id).data('subtotal',subtotal); 
            $(this).parent().parent().find('#inp_subtotal_'+id).val(subtotal);
            // console.log($('#checkbox_'+id).data('harga'));

            // convert rupiah from kqty keyup
            var	number_string = subtotal.toString(),
                sisa 	= number_string.length % 3,
                rupiah 	= number_string.substr(0, sisa),
                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');    
            }

            if($('#checkbox_'+id).is(':checked') === true){
                calcToSub();
                if(tipe_diskon === 'presentase'){
                    diskon = global_subtotal * presentase;
                    var	number_string = diskon.toString(),
                        sisa 	= number_string.length % 3,
                        rupiah2 	= number_string.substr(0, sisa),
                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                            
                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah2 += separator + ribuan.join('.');    
                        }
                    $('#diskon_text').text(rupiah2); 
                    $('#diskon_inp').val(diskon);
                }
            };
            $('#subtotal_item_text_'+id).text(rupiah);  
        });
    });

    // dynamic cart from checkbox key
    $('.fill-control-input').each(function(){
            $(this).click(function(){
                var fixSubtotal= 0;
                var allVals = [];
                $('.fill-control-input:checked').each(function(){
                    allVals.push($(this).attr('data-id'));
                    subtotal = $(this).data('subtotal');
                    fixSubtotal += parseInt(subtotal);

                    global_subtotal = fixSubtotal;
                    
                    if(tipe_diskon === 'presentase'){
                        diskon = global_subtotal * presentase;
                        var	number_string = diskon.toString(),
                                        sisa 	= number_string.length % 3,
                                        rupiah 	= number_string.substr(0, sisa),
                                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                            
                        if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        rupiah += separator + ribuan.join('.');    
                        }

                        $('#diskon_text').text(rupiah); 
                        $('#diskon_inp').val(diskon);
                    }

                    var total = global_subtotal - diskon;
                    var	number_string = total.toString(),
                        sisa 	= number_string.length % 3,
                        rupiah2 	= number_string.substr(0, sisa),
                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah2 += separator + ribuan.join('.');    
                    }

                    // convert rupiah from checkbox func
                    var	number_string = fixSubtotal.toString(),
                        sisa 	= number_string.length % 3,
                        rupiah 	= number_string.substr(0, sisa),
                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');    
                    }
                    $('#subtotal_text').text(rupiah);  
                    $('#total_text').text(rupiah2); 
                });
                if (allVals.length === 0) {
                    $('#subtotal_text').text(0);
                    $('#total_text').text(0);  
                    $('#diskon_text').text(0);  
                }
            });
    });

    // dynamic cart from qty key and checked
    function calcToSub(){
            var subtotal = 0;
            var totalsum = 0;
            $('.subtotal_inp').each(function(){
                var id = $(this).data('id');
                if($('#checkbox_'+id).is(':checked') === true){
                    subtotal = parseInt($('#inp_subtotal_'+id).val());
                    totalsum += subtotal;
                };

                global_subtotal = totalsum;
                total = global_subtotal - diskon;

                var	number_string = total.toString(),
                    sisa 	= number_string.length % 3,
                    rupiah2 	= number_string.substr(0, sisa),
                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                            
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah2 += separator + ribuan.join('.');    
                }

                
                // convert rupiah from checkbox func
                var	number_string = totalsum.toString(),
                    sisa 	= number_string.length % 3,
                    rupiah 	= number_string.substr(0, sisa),
                    ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                            
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');    
                }
                $('#subtotal_text').text(rupiah); 
                $('#total_text').text(rupiah2); 
            });
    };

    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
        calcToSub();
    });


</script>