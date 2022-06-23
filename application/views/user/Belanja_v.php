<div class="container-fluid mt-4">
  <div class="container-fluid">
    <div class="card">
      <h5 class="card-header">Keranjang</h5>
      <div class="card-body">
        <!-- Display Shopping Cart CI3 -->
        <?php echo form_open('Belanja/update'); ?>
        <table class="table" cellpadding="6" cellspacing="1" style="width:100%">
          <tr>
            <th style="text-align: left;">Jumlah Produk</th>
            <th style="text-align: left;">Nama Produk</th>
            <th style="text-align: left;">Berat Produk</th>
            <th style="text-align: left;">Harga Produk</th>
            <th style="text-align: left;">Sub-Total</th>
            <th class="text-center">Action</th>
          </tr>
          <?php $i = 1; ?>
          <?php
          $tot_berat = 0;
          foreach ($this->cart->contents() as $items) {
            $produk = $this->Beranda_m->detail_produk($items['id']);
            $berat = $items['qty'] * $produk->berat;
            $tot_berat = $tot_berat + $berat;
          ?>
            <tr>
              <td>
                <?php
                echo form_input(array(
                  'name' => $i . '[qty]',
                  'value' => $items['qty'],
                  'maxlength' => '3',
                  'min' => '0',
                  'size' => '5',
                  'type' => 'number',
                  'class' => 'form-control text-center',
                  'style' => 'max-width: 100px;',
                )); ?>
              </td>
              <td style="text-align: left;"><?php echo $items['name']; ?></td>
              <td style="text-align: left;"><?php echo $berat ?> Gram</td>
              <td style="text-align: left;">Rp <?php echo number_format($items['price'], 0); ?></td>
              <td style="text-align: left;">Rp <?php echo number_format($items['subtotal'], 0); ?></td>
              <td class="text-center">
                <a href="<?php echo base_url('Belanja/delete/' . $items['rowid']); ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php } ?>
          <tr>
            <td>
              <h5>Total</h5>
            </td>
            <td colspan="1"></td>
            <td>
              <h5><?php echo $tot_berat ?> Gram</h5>
            </td>
            <td colspan="1"></td>
            <td>
              <h5>Rp <?php echo number_format($this->cart->total(), 0); ?></h5>
            </td>
          </tr>
        </table>
        <!-- End Display Shopping Cart CI3 -->
        <section>
          <div class="row">
            <div class="text-lg-end">
              <button type="submit" class="btn btn-primary">Update Cart</button>
              <a href="<?php echo base_url('Belanja/delete_all') ?>" class="btn btn-danger">Hapus Semua</a>
              <a type="submit" class="btn btn-secondary">Check Out</a>
            </div>
          </div>
        </section>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>