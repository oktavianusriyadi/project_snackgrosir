<div class="container-fluid">
  <!-- Detail -->
  <div class="row justify-content-center">
    <div class="card shadow mt-4 mx-5" style="max-width: 1000px;">
      <div class="row g-0">
        <div class="col-md-3">
          <img src="<?php echo base_url('assets/imgcover/' . $detail->gambar) ?>" class="img-fluid rounded-start my-4" alt="...">
        </div>
        <div class="col-md-5">
          <div class="card-body">
            <h5 class="card-title fw-bold" style="font-size: x-large;"><?php echo $detail->nama_produk ?></h5>
            <p class="dharga">Rp <?php echo number_format($detail->harga, 0) ?></p>
            <table class="table">
              <td>Kategori</td>
              <td><?php echo $detail->kategori ?></td>
              </tr>
              <tr>
                <td>Rasa</td>
                <td>Rasa yang tertinggal</td>
              </tr>
            </table>
            <p class="deskP text-black-50"><?php echo $detail->deskripsi ?></p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-body">
            <h5 class="card-title fw-bold" style="font-size: x-large;">Atur Jumlah Produk</h5>
            <?php
            echo form_open('Belanja/add');
            echo form_hidden('id', $detail->id_produk);
            echo form_hidden('price', $detail->harga);
            echo form_hidden('name', $detail->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
            ?>
            <!-- Jumlah Item -->
            <div class="row">
              <div class="col-md-6">
                <div class="mt-3">
                  <div class="input-group mt-3">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success btnplusmin btn-sm" data-type="minus" data-field="qty">
                        <span class='bx bx-minus'></span>
                      </button>
                    </span>
                    <input type="text" name="qty" class="form-control qty text-center" style="height: 31px;" value="1" min="1" max="100">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-success btnplusmin btn-sm" data-type="plus" data-field="qty">
                        <span class="bx bx-plus"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Jumlah Item -->
            <div class="card-body">
              <div class="row">
                <button type="submit" class="btn btnCart btn-md btn-warning swalDefaultSuccess mb-2">Tambah <i class="fa-solid fa-cart-plus"></i></button>
                <button class="btn btnBuy btn-outline-success">Beli Langsung</button>
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Detail -->
</div>


<!-- CSS -->
<style>
  .detail {
    font-family: 'Ubuntu', sans-serif;
  }

  .btnCart,
  .btnBuy,
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