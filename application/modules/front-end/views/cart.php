<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    .shopping-cart {
        width: auto;
        height: auto;
        margin: 20px auto;
        background: #FFFFFF;
        box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
        border-radius: 6px;

        display: flex;
        flex-direction: column;
    }

    .title {
        height: 60px;
        border-bottom: 1px solid #E1E8EE;
        padding: 20px 30px;
        color: #5E6977;
        font-size: 18px;
        font-weight: 400;
    }

    .item {
        padding: 20px 30px;
        height: 120px;
        display: flex;
        border-bottom: #f6f6f6 solid;
    }

    /* .item:nth-child(3) {
        border-top: 1px solid #E1E8EE;
        border-bottom: 1px solid #E1E8EE;
    } */

    /* Buttons -  Delete and Like */
    .buttons {
        position: relative;
        padding-top: 30px;
        margin-right: 60px;
    }

    .delete-btns {
        display: inline-block;
        cursor: pointer;
        width: 18px;
        height: 17px;
        background: url("public/assets/img/delete-icn.svg") no-repeat center;
        margin-right: 20px;
    }

    .like-btns {
        position: absolute;
        top: 9px;
        left: 15px;
        display: inline-block;
        background: url('public/assets/img/twitter-heart.png');
        width: 60px;
        height: 60px;
        background-size: 2900%;
        background-repeat: no-repeat;
        cursor: pointer;
    }

    .is-active {
        animation-name: animate;
        animation-duration: .8s;
        animation-iteration-count: 1;
        animation-timing-function: steps(28);
        animation-fill-mode: forwards;
    }

    @keyframes animate {
        0% {
            background-position: left;
        }

        50% {
            background-position: right;
        }

        100% {
            background-position: right;
        }
    }

    /* Product Image */
    .image {
        margin-right: 100px;
    }

    /* Product Description */
    .description {
        padding-top: 10px;
        margin-right: 120px;
        width: 220px;
    }

    .description span {
        display: block;
        font-size: 14px;
        color: #43484D;
        font-weight: 400;
    }

    .description span:first-child {
        margin-bottom: 5px;
    }

    .description span:last-child {
        font-weight: 300;
        margin-top: 8px;
        color: #86939E;
    }

    /* Product Quantity */
    .quantity {
        padding-top: 20px;
        margin-right: 120px;
    }

    .quantity input {
        -webkit-appearance: none;
        border: none;
        text-align: center;
        width: 32px;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    button[class*=btns] {
        width: 30px;
        height: 30px;
        background-color: #E1E8EE;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }

    .minus-btns img {
        margin-bottom: 3px;
    }

    .plus-btns img {
        margin-top: 2px;
    }

    button:focus,
    input:focus {
        outline: 0;
    }

    /* Total Price */
    .total-price {
        width: 95px;
        padding-top: 27px;
        text-align: center;
        font-size: 16px;
        color: #43484D;
        font-weight: 300;
    }

    /* Responsive */
    @media (max-width: 800px) {
        .shopping-cart {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .item {
            height: auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image img {
            width: 50%;
        }

        .image,
        .quantity,
        .description {
            width: 100%;
            text-align: center;
            margin: 6px 0;
        }

        .buttons {
            margin-right: 20px;
        }
    }
</style>

<!-- Section Contact -->
<section id="contact-detail" class=" padd-100">
    <h2 class="section-title sep-type-2 text-center">รายการอาหาร</h2>
    <div class="container">
        <?php 
            if (!empty($this->cart->contents())) : 
            $item = "";
            foreach ($this->cart->contents() as $key => $check_item_id) {
                $item = $check_item_id['id'];
                if ($key == 0) {
                    break;
                }
            }
            $menuOne = $this->db->get_where('tbl_menu',['id' => $item])->row_array();
            $menuList = $this->db->get_where('tbl_menu',['id_restaurant' => $menuOne['id_restaurant']])->result_array();
            $restaurantName = $this->db->get_where('tbl_restaurant',['id' => $menuOne['id_restaurant']])->row_array();
            
        ?>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มรายการอาหาร</h4>
                </div>
                <div class="modal-body" style="padding:0;">
                    
                    <h1 class="text-center form-group"><?php echo $restaurantName['restaurant_name']; ?></h1>
                    <div class="shopping_listOrder">
                        
                        <?php  foreach ($menuList as  $menuDetail) { ?>
                        <div style="width:25%;float:left;padding: 15px;" class="form-group" data-filter="<?php echo $menuDetail['id_type_food'];  ?>">

                            <a href="add_cart?id=<?php echo $menuDetail['id'];  ?>" style="color: #337ab7; text-decoration: none;">
                                <div class="border_food_shopping">
                                    <div class="image_food_shopping"><img src="uploads/food/<?php echo $menuDetail['file_name']; ?>" alt=""></div>
                                    <span><?php echo $menuDetail['price_menu']; ?> บาท</span>
                                    <h3><?php echo $menuDetail['name_menu']; ?></h3>
                                </div>
                            </a>
                                            
                        </div>
                        <?php } ?>
                    </div>
                     
                </div>
                <div class="modal-footer">
                
                </div>
            </div>
            
            </div>
        </div>

            <div class="row">
                <div style="padding: 0 30px;">
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">เพิ่มรายการอาหาร</button>
                </div>
            </div>
        <?php endif ; ?>
        <div class="row">
        <?php if (!empty($this->cart->contents())) : ?>
            <div class="shopping-cart">
                <div style="padding:20px 30px 0; font-size: 18px; font-weight: 400; color:red">
                    **หมายเหตุ คุณจะไม่สามารถสั่งอาหารจากร้านอื่นได้**
                </div>
                <!-- Title -->
                <div class="title">
                    รายละเอียดรายการ
                </div>


                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items) : ?>

                    

                    <!-- Product #1 -->
                    <div class="item">
                    <?php 
                        echo form_hidden('rowid', $items['rowid']); 
                        echo form_hidden('price', $items['price']);
                    ?>
                        <div class="buttons">
                            <a href="delet_cart?rowid=<?php echo $items['rowid']; ?>">
                            <span class="delete-btns"></span>
                            </a>
                            <!-- <span class="like-btns"></span> -->
                        </div>

                        <div class="image">
                            <img src="uploads/food/<?php echo $items['file_name'] ?>" alt="" style="width: 90px; height:90px" />
                        </div>

                        <div class="description">
                            <span><?php echo $items['name'] ?></span>
                            
                        </div>

                        <div class="quantity">
                            <button class="minus-btns" type="button" name="button">
                                <img src="public/assets/img/minus.svg" alt="" />
                            </button>
                            <input type="text" name="name" value="<?php echo $items['qty'] ?>" readonly>
                            <button class="plus-btns" type="button" name="button">
                                <img src="public/assets/img/plus.svg" alt="" />
                            </button>
                        </div>

                        <div class="total-price"><?php echo $this->cart->format_number($items['subtotal']); ?> บาท</div>
                    </div>
                    <?php $i++; ?>

                <?php endforeach; ?>

                <!-- Product #3 -->
                <div class="item">
                    <div class="buttons">

                    </div>

                    <div class="image" style="margin-right: 450px;">

                    </div>

                    <div class="description" style="padding-top: 27px;margin-right: 0px;text-align: right;">
                        ยอดรวมทั้งหมด
                    </div>

                    <div class="quantity">

                    </div>

                    <div class="total-price" id="total_pirce">
                        <?php echo $this->cart->format_number($this->cart->total()); ?> บาท
                    </div>
                    
                </div>

            </div>
            <div style="text-align: right;">
                <!-- <button type="button" class="btn btn-success" style="font-size: 18px;width: 233px;">ยืนยันการสั่งซื้อสินค้า</button> -->
                <a href="Order_User" class="btn btn-success" style="font-size: 18px;width: 233px;">ยืนยันการสั่งซื้อสินค้า</a>
            </div>
            <?php else : ?>
				<div class="text-center">
					<h1 style="margin: 0;color: #fe58a4;font-size: 100px;">ไม่มีสินค้าในตะกร้า</h1>
					<h1>กรุณาลองเลือกอาหารร้านอื่นดูครับ</h1>
					<a href="index">เลือกอาหารร้านอื่นๆ</a>
				</div>
			<?php endif ; ?>
        </div>
    </div>
</section>


<script type="text/javascript">
    
    function getTotalitem() {
        $.ajax({
            url:'total_cart_item',
            success:function(response){
                $('.order_shopping_number').html(response);
            }
        })
    }

    function getTotal() {
        $.ajax({
            url:'total_cart',
            success:function(response){
                $('#total_pirce').html(response + " บาท");
            }
        })
    }


    function setNumber(params,button) {

        let input = $(button).parent().find('input');
        let row_id = $(button).parents('.item').find('input[name="rowid"]').val();
        let price = $(button).parents('.item').find('input[name="price"]').val();
        let amount = $(input).val();
            amount = JSON.parse(amount);

        $.ajax({
          url:'update_cart',
          method: 'post',
          data:{
            type: params,
            amount: amount,
            row_id: row_id,
            price:price
          },
          success:function (response) {
            response = JSON.parse(response);
            $(input).val(response.amount);
            $(button).parents('.item').find('.total-price').html(response.sub_total + " บาท");
            getTotalitem();
            getTotal();
          }
        });
        
        
    }
    $('.minus-btns').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        setNumber('minus',$this)
    });

    $('.plus-btns').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        setNumber('plus',$this)
    });

    $('.like-btns').on('click', function() {
        $(this).toggleClass('is-active');
    });
</script>