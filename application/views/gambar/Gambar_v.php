 <!-- Content wrapper -->
 <div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
     <div class="card">
       <h5 class="card-header">Gambar Produk</h5>
       <div class="card-body">
         <!-- Content -->
         <?php
          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-dark alert-dismissible mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
          }
          ?>
         <table id="example" class="display compact" style="width:100%">
           <thead>
             <tr>
               <th class="text-center">No</th>
               <th>Nama Produk</th>
               <th class="text-center">Cover</th>
               <th class="text-center">Jumlah</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php $no = 1;
              foreach ($gambarC as $key => $value) { ?>
               <tr>
                 <td class="text-center"><?php echo $no++; ?></td>
                 <td><?php echo $value->nama_produk ?></td>
                 <td class="text-center"><img src="<?php echo base_url('assets/imgcover/' . $value->gambar) ?>" width="100px" alt=""></td>
                 <td class="text-center text-black fw-bold"><?php echo $value->total_gambar ?></td>
                 <td>
                   <a href="#" class="btn btn-success btn-sm">
                     <i class="fas fa-search-plus"></i>
                   </a>
                   <a href="<?php echo base_url('Gambar/add/' . $value->id_produk) ?>" type="button" class="btn btn-primary btn-sm">
                     <i class="bx bx-image-add"></i>
                   </a>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
       </div>
       <!-- / Content -->
     </div>
   </div>