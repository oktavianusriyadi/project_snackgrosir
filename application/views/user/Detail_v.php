<div class="container-fluid">
  <div class="mt-3">
    <a href="<?php echo base_url('Beranda'); ?>" class="btn btn-outline-primary fw-bold text-decoration-none">
      Kembali
    </a>
  </div>
  <!-- Detail -->
  <section class="px-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" src="<?php echo base_url('assets/imgcover/' . $detail->gambar) ?>" alt="..." /></div>
        <div class="col-md-8">
          <h1 class="display-5 fw-bolder"><?php echo $detail->nama_produk ?></h1>
          <h6 class="text-black">Kategori : <?php echo $detail->kategori ?></h6>
          <div class="dharga fs-5 mb-5">
            <span>Rp <?php echo number_format($detail->harga, 0) ?></span>
          </div>
          <p class="deskP lead"><?php echo $detail->deskripsi ?></p>
          <div class="d-flex">
            <?php
            echo form_open('Belanja/add');
            echo form_hidden('id', $detail->id_produk);
            echo form_hidden('price', $detail->harga);
            echo form_hidden('name', $detail->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>
            <div class="row">
              <div class="col-md-5 col-8">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-info btnplusmin" data-type="minus" data-field="qty">
                      <span class='bx bx-minus'></span>
                    </button>
                  </span>
                  <input type="text" name="qty" class="form-control qty text-center" value="1" min="1" max="100">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-outline-info btnplusmin" data-type="plus" data-field="qty">
                      <span class="bx bx-plus"></span>
                    </button>
                  </span>
                </div>
              </div>
              <div class="col-md-7 col-4">
                <button type="submit" class="btn btnCart btn-outline-info swalDefaultSuccess">
                  <i class="fa-solid fa-cart-plus"></i>
                </button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Detail -->
</div>


<!-- CSS -->
<style>
  .detail {
    font-family: 'Ubuntu', sans-serif;
  }

  .btnCart,
  .qty,
  .btnB {
    font-weight: 500;
    color: black;
  }

  .dharga {
    font-family: 'Ubuntu', sans-serif;
    font-weight: bold;
    font-size: x-large;
  }

  .deskP,
  .ketP {
    font-family: 'Arial Narrow Bold', sans-serif;
    font-size: 15px;
  }

  .card-text,
  .btnRasa {
    font-family: 'Ubuntu', sans-serif;
    font-weight: bold;
    font-size: medium;
  }
</style>
<!-- //CSS -->

<!-- PlusMinusJS -->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.btnplusmin').click(function(e) {
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type = $(this).attr('data-type');
    var input = $("input[name='" + fieldName + "']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
      if (type == 'minus') {

        if (currentVal > input.attr('min')) {
          input.val(currentVal - 1).change();
        }
        if (parseInt(input.val()) == input.attr('min')) {
          $(this).attr('disabled', true);
        }

      } else if (type == 'plus') {

        if (currentVal < input.attr('max')) {
          input.val(currentVal + 1).change();
        }
        if (parseInt(input.val()) == input.attr('max')) {
          $(this).attr('disabled', true);
        }

      }
    } else {
      input.val(0);
    }
  });
  $('.qty').focusin(function() {
    $(this).data('oldValue', $(this).val());
  });
  $('.qty').change(function() {

    minValue = parseInt($(this).attr('min'));
    maxValue = parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());

    name = $(this).attr('name');
    if (valueCurrent >= minValue) {
      $(".btnplusmin[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Sorry, the minimum value was reached');
      $(this).val($(this).data('oldValue'));
    }
    if (valueCurrent <= maxValue) {
      $(".btnplusmin[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
    } else {
      alert('Sorry, the maximum value was reached');
      $(this).val($(this).data('oldValue'));
    }


  });
  $(".qty").keydown(function(e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
      // Allow: Ctrl+A
      (e.keyCode == 65 && e.ctrlKey === true) ||
      // Allow: home, end, left, right
      (e.keyCode >= 35 && e.keyCode <= 39)) {
      // let it happen, don't do anything
      return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  });
</script>
<!-- EnsPlusMinusJS -->