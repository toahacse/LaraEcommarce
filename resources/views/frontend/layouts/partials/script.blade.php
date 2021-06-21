
<script src="{{asset('/')}}/admin/js/jQuarey.js"></script>
<script src="{{ asset("js/jquery-3.5.1.min.js") }}"></script>
<script src="{{asset('/')}}/admin/js/popper.js"></script>
<script src="{{asset('/')}}/admin/js/bootstrap.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(product_id) {

        var url = "{{ url('/') }}";
        $.post(url+"/api/carts/store",
            {
                product_id: product_id
            })
            .done( function (data) {
                data = JSON.parse(data);
              if(data.status=='success'){

                  alertify.set('notifier','position', 'top-center');
                  alertify.success('Item Add To Cart Successfully !! Total item: '+data.totalItems+ '<br/> to Checkout, <a href="{{ route('carts') }}">go to checkout page</a>');

                  $('#totalItems').html(data.totalItems);
              }
            })
    }
</script>