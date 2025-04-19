{{-- // start wishlitst add option #player --}}
<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function addToWishList(course_id){

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "{{ url('/') }}"+"/add-to-wishlist/"+course_id,

            success:function(data){
                //console.log(data);

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                            })
                        }

                    // End Message
                }

        })
    }

</script>


{{-- // start wishlitst add option --}}
<script type="text/javascript">

    function wishlist(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "{{ url('/') }}"+"/get-wishlist-course/",

            success:function(response){

                $('#wishQty').text(response.wishQty);

                var BaseUrl = "{{ url('/') }}";
                var ImageBaseUrl = "{{ url('/') }}/public";

                var rows = ""
                $.each(response.wishlist, function(key, value){
                    rows += `
                        <div class="col-lg-4 responsive-column-half">
                            <div class="card card-item">
                                <div class="card-image">
                                    <a href="${BaseUrl}/course/details/${value.course.id}/${value.course.course_name_slug}" class="d-block">
                                        <img class="card-img-top" src="${ImageBaseUrl}/${value.course.course_image}" alt="Card image cap">
                                    </a>
                                </div><!-- end card-image -->
                                <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">${value.course.label}</h6>

                                    <h5 class="card-title"><a href="${BaseUrl}/course/details/${value.course.id}/${value.course.course_name_slug}">${value.course.course_name}</a></h5>

                                    <div class="d-flex justify-content-between align-items-center">

                                        ${value.course.discount_price == null
                                        ? `<p class="card-price text-black font-weight-bold">$${value.course.selling_price}</p>`
                                        :`<p class="card-price text-black font-weight-bold">$${value.course.discount_price} <span class="before-price font-weight-medium">$${value.course.selling_price}</span></p>`
                                        }

                                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="Remove from Wishlist" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="la la-heart"></i></div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    `

                });
                $('#wishlist').html(rows);

            }
        })

    }
    wishlist();


    // Wishlist Remove Start

    function wishlistRemove(id){

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('/') }}"+"/wishlist-remove/"+id,


            success:function(data){

                wishlist();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }

        })
    }

</script>


{{-- // Start add to cart --}}
<script type="text/javascript">

    function addToCart(courseId, courseName, instructorId, slug){

        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                course_name: courseName,
                course_name_slug: slug,
                instructor: instructorId,
            },

            url: "{{ url('/') }}"+"/cart/data/store/"+courseId,

            success: function(data){

                miniCart();


                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }

        });

    }

</script>
{{-- //end add to cart --}}



{{-- // Start buy now --}}
<script type="text/javascript">

    function buyCourse(courseId, courseName, instructorId, slug){

        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                _token: "{{ csrf_token() }}",
                course_name: courseName,
                course_name_slug: slug,
                instructor: instructorId,
            },

            url: "{{ url('/') }}"+"/buy/data/store/"+courseId,

            success: function(data){

                miniCart();


                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                        // Redirect to the checkout page #cartPage
                        window.location.href = "{{ url('/') }}"+'/checkout'

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }

        });

    }

</script>
{{-- //end buy now --}}

{{-- // Start Mini Cart --}}
<script type="text/javascript">

    function miniCart(){

        $.ajax({
            type: "GET",
            url: "{{ url('/') }}"+"/course/mini/cart/",
            dataType: "json",
            success: function(response){

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);

                var BaseUrl = "{{ url('/') }}";
                var ImageBaseUrl = "{{ url('/') }}/public";

                var miniCart = ""

                $.each(response.carts, function(key, value){

                    miniCart  +=`<li class="media media-card">
                                    <a href="shopping-cart.html" class="media-img">
                                        <img src="${ImageBaseUrl}/${value.options.image}" alt="Cart image">
                                    </a>
                                    <div class="media-body">
                                        <h5><a href="${BaseUrl}/course/details/${value.id}/${value.options.slug}">${value.name}</a></h5>

                                        <span class="d-block fs-14">$${value.price}</span>
                                        <a type='submit' id='${value.rowId}' onclick='miniCartRemove(this.id)'><i class='la la-times'></i></a>
                                    </div>
                                </li>
                                `
                });
                $('#miniCart').html(miniCart);

            }
        })
    }
    miniCart();


    // Mini Cart Remove Start

    function miniCartRemove(rowId){

        $.ajax({
            type: "GET",
            url: "{{ url('/') }}"+"/minicart/course/remove/"+rowId,
            dataType: "json",
            success: function(data){

                miniCart();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }
        })

    }

    // End Mini Cart Remove

</script>



{{-- // Start  MyCart --}}
<script type="text/javascript">

function cart(){

    $.ajax({
        type: "GET",
        url:  "{{ url('/') }}"+"/get-cart-course",
        dataType: "json",

        success: function(response){

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                // $('#cartQty').text(response.cartQty);

                var BaseUrl = "{{ url('/') }}";
                var ImageBaseUrl = "{{ url('/') }}/public";

                var rows = ""
                $.each(response.carts, function(key, value){

                    rows  +=` <tr>
                                <th scope="row">
                                    <div class="media media-card">
                                        <a href="${BaseUrl}/course/details/${value.id}/${value.options.slug}" class="media-img mr-0">
                                            <img src="${ImageBaseUrl}/${value.options.image}" alt="Cart image">
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <a href="${BaseUrl}/course/details/${value.id}/${value.options.slug}" class="text-black font-weight-semi-bold">${value.name}</a>
                                </td>
                                <td>
                                    <ul class="generic-list-item font-weight-semi-bold">
                                        <li class="text-black lh-18">$${value.price}</li>
                                    </ul>
                                </td>
                                <td>
                                    <button type="button" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="Remove"
                                        id="${value.rowId}"
                                        onclick="cartRemove(this.id)">
                                        <i class="la la-times"></i>
                                    </button>
                                </td>
                            </tr>
                            `
                });
                $('#cartPage').html(rows);

            }
        })
    }
    cart();


     // My Cart Remove Start

     function cartRemove(rowId){

        $.ajax({
            type: "GET",
            url: "{{ url('/') }}"+"/cart-remove/"+rowId,
            dataType: "json",
            success: function(data){

                miniCart();
                cart();
                couponCalculation();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }
        })

        }

// End My Cart Remove


</script>

{{-- End  MyCart --}}


{{-- // Apply Coupon Start  --}}
<script type="text/javascript">

    function applyCoupon(){

        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {coupon_name: coupon_name},
            url: "{{ url('/') }}"+"/coupon-apply",

            success: function(data){

                couponCalculation();

                if(data.validity == true){
                    $('#couponField').hide();
                }

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message


            }
        })
    }


    // Start Coupon Calculation Method
    function couponCalculation(){
        $.ajax({
            type: "GET",
            url: "{{ url('/') }}"+"/coupon-calculation",
            dataType: "json",

            success: function(data){

                if(data.total){
                    $('#couponCalField').html(
                        `<h3 class="fs-18 font-weight-bold pb-3">Cart Totals</h3>
                        <div class="divider"><span></span></div>
                        <ul class="generic-list-item pb-4">
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Subtotal: $</span>
                                <span>$${data.total}</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Total: $</span>
                                <span>$${data.total}</span>
                            </li>
                        </ul>`
                    )
                }else{
                    $('#couponCalField').html(
                        `<h3 class="fs-18 font-weight-bold pb-3">Cart Totals</h3>
                        <div class="divider"><span></span></div>
                        <ul class="generic-list-item pb-4">
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Subtotal: </span>
                                <span>$${data.subtotal}</span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Coupon Name: </span>
                                <span>
                                    ${data.coupon_name}

                                    <button type="button" class="icon-element icon-element-xs shadow-sm border-0" data-toggle="tooltip" data-placement="top" title="Remove"
                                        onclick="couponRemove()">
                                        <i class="la la-times"></i>
                                    </button>
                                </span>
                            </li>
                            <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Coupon Discount: </span>
                                <span>$${data.discount_amount}</span>
                            </li>
                             <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                <span class="text-black">Grand Total: </span>
                                <span>$${data.total_amount}</span>
                            </li>
                        </ul>`
                    )
                }

            }

        })
    }
    couponCalculation();
// End Apply Coupon
</script>


<script type="text/javascript">
// End Apply Instructor Coupon
    function applyInsCoupon(){
        var coupon_name = $('#coupon_name').val();
        var course_id = $('#course_id').val();
        var instructor_id = $('#instructor_id').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {coupon_name:coupon_name,course_id:course_id,instructor_id:instructor_id},
            url: "{{ url('/') }}"+"/inscoupon-apply",

            success: function(data){

                couponCalculation();

                if(data.validity == true){
                    $('#couponField').hide();
                }

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message


            }
        })
    }

</script>


{{-- // Apply Remove Coupon Start  --}}
<script type="text/javascript">

    function couponRemove(){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ url('/') }}"+"/coupon-remove",

            success: function(data){

                couponCalculation();
                $('#couponField').show();

                // Start Message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        })

                }else{

                Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                }
                // End Message

            }
        })
    }


// End Remove Coupon
</script>
